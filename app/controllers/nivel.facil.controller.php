<?php
require_once '../models/Niveles.php';

header('Content-Type: application/json');

class JuegoController {
    private $niveles;

    public function __construct() {
        $this->niveles = new Niveles();
    }

    // Método para validar la respuesta del usuario
    public function validarRespuesta($respuestaUsuario, $palabraCorrecta) {
        return strcasecmp($respuestaUsuario, $palabraCorrecta) == 0;
    }


    // Método para obtener 4 imágenes aleatorias de una palabra
public function obtenerImagenesAleatorias() {
    $imagenes = $this->niveles->obtenerImagenesAleatorias();
    $pista = $imagenes[0]['pista']; // Obtén la pista de la primera imagen
    $totalPalabras = $this->niveles->obtenerTotalPalabras();

     
    return ['imagenes' => $imagenes, 'pista' => $pista, 'totalPalabras' =>$totalPalabras ];
}

}



// Inicialización del controlador
$controller = new JuegoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['respuesta']) && empty($_POST['palabra'])) {
        // Obtener imágenes iniciales
        $imagenes = $controller->obtenerImagenesAleatorias();
        echo json_encode([
            'correcto' => true, 
            'imagenes' => $imagenes['imagenes'],  // Devuelve solo el array de imágenes
            'pista' => $imagenes['pista']    ,
            'totalPalabras' => $imagenes['totalPalabras'] 
                 
        ]);
    } else {
        
        $respuesta = $_POST['respuesta'];
        $palabra = $_POST['palabra'];
        
        $esCorrecta = $controller->validarRespuesta($respuesta, $palabra);
        
        if ($esCorrecta) {
            // Obtener nuevas imágenes si la respuesta es correcta
            $imagenes = $controller->obtenerImagenesAleatorias();
            echo json_encode([
                'correcto' => true,
                'mensaje' => 'Respuesta correcta 😁', 
                'imagenes' => $imagenes['imagenes'],  // Nuevas imágenes
                'pista' => $imagenes['pista'] ,
                   
            ]);
        } else {
            
            echo json_encode(['correcto' => false, 'mensaje' => 'Respuesta incorrecta. Inténtalo de nuevo 😭']);
        }
    }
    exit;
}


?>
