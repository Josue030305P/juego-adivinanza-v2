<?php

require_once('../models/Categoria.php');

$game = new Categoria();
$result = $game->listarCategorias();

var_dump($result);