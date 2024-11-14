<?php

require_once(__DIR__ . '/../models/Game.php');

$game = new Categoria();
$result = $game->listarCategorias();

var_dump($result);