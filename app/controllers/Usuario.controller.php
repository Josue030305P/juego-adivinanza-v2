<?php
session_start();
require_once("../models/Usuario.php");

$usuario = new Usuario();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['operation'] == 'login') {
    $nomuser = $usuario->limpiarCadena($_POST['nomuser']);
    $passuser = $usuario->limpiarCadena($_POST['passuser']);
    $statusLogin = ["esCorrecto" => false, "mensaje" => ""];

    $registro = $usuario->login(['nomuser' => $nomuser]);

    if (count($registro) == 0) {
        $statusLogin["mensaje"] = "Usuario no existe";
    } else {
        $claveEncriptada = $registro[0]['passuser'];
        if (password_verify($passuser, $claveEncriptada)) {
            $statusLogin["esCorrecto"] = true;
            $statusLogin["mensaje"] = "Bienvenido". ' ' . $registro[0]['nomuser'];;
            $_SESSION["login"] = [
                "status" => true,
                "idusuario" => $registro[0]['idusuario'],
                "nomuser" => $registro[0]['nomuser'],
                "puntos" => $registro[0]['puntos']
            ];
        } else {
            $statusLogin["mensaje"] = "Contraseña incorrecta";
        }
    }

    echo json_encode($statusLogin);
}

