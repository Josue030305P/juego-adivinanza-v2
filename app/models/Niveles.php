<?php
require_once(__DIR__ . '/../../config/Conexion.php');

class Niveles extends Conexion {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConexion();
    }

    public function obtenerImagenesAleatorias() {
        try {
            $cmd = $this->pdo->prepare('CALL sp_imagen_palabra_aleatoria()');
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            return ['error' => 'Error al obtener imágenes: ' . $e->getMessage()];
        }
    }

    public function obtenerTotalPalabras() {
        try {
            $cmd = $this->pdo->prepare('SELECT COUNT(DISTINCT palabra) as total FROM palabras');
            $cmd->execute();
            $result = $cmd->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $e) {
            return ['error' => 'Error al obtener total de palabras: ' . $e->getMessage()];
        }
    }
}
?>