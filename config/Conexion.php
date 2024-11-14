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




    

   public static function limpiarCadena($cadena) : string {

    

    // ** JavaScript
    $cadena = trim($cadena);
    // ** Eliminar lo que no se puede enviar 
    $cadena = stripslashes($cadena); // Eliminar backslash
    $cadena = str_ireplace("<script>", "", $cadena);
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src=", "", $cadena);
    $cadena = str_ireplace("'>", "", $cadena);



    // ** SQL

    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE * FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASE", "", $cadena);

    // ** ETIQUETAS
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace(">", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("{", "", $cadena);
    $cadena = str_ireplace("}", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace("===", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);




    return $cadena;


   }

}






