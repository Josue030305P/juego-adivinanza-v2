<?php

require_once(__DIR__ . '/../../config/Conexion.php');


class Categoria  extends Conexion{

    private $pdo;
    public function __construct() {
        
       // Obteniendo la conexión a la base de datos
       $this->pdo = parent::getConexion();
    }

    public function listarCategorias()  {
        try {
            $cmd = $this->pdo->prepare('call sp_categorias_listar()');
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return ($result);
            
        } catch(Exception $e) {
            return ['error' => 'Error al obtener las categorías: ' . $e->getMessage()];
    }


    }
}