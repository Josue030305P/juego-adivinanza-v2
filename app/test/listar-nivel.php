<?php

require_once(__DIR__ . '/../models/Niveles.php');

$game = new Niveles();
$result = $game->obtenerImagenesAleatorias();
var_dump($result);