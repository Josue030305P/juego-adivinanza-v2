<?php 


const SERVER = 'localhost';
const DB = 'juego_v2';
const USER = 'root';
const PASSWORD = '';
const SGBD = 'mysql:host' . SERVER . ';portname=3306;dbname=' .DB . ';charset=UTF8';


class Conexion {

    protected  function getConexion() {
        try {
             $pdo = new PDO(SGBD,USER, PASSWORD);
             $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
             return $pdo;

        } catch (Exception $e) {
            
            die();

        }
    }

}






?>