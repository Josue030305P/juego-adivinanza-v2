<?php

require_once '../models/Categoria.php';  // Incluye el modelo de categorías

header('Content-Type: application/json');

//Initialize category object
$categoria = new Categoria();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $categorias = $categoria->listarCategorias();
        echo json_encode($categorias);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}