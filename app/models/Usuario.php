<?php
require_once ('../../config/Conexion.php');
class Usuario extends Conexion {
    private $pdo;

    public function __CONSTRUCT() {
        $this->pdo = parent::getConexion();
    }

    public function login($params = []): array {
        try {
            $cmd = $this->pdo->prepare("CALL spu_usuarios_login(?)");
            $cmd->execute(array($params['nomuser']));
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error login: " . $e->getMessage());
            return [];
        }
    }
}


// $usuario = new Usuario();
// $respuesta = $usuario->login(["nomuser" => "Josué"]);
// var_dump($respuesta);
