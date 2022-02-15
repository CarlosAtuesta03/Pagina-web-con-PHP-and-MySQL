<?php 
$host="localhost";
$bd="e-commerce";
$usuario="root";
$contrasena="";

try 
{
    $conexion= new PDO("mysql:host=$host;dbname=$bd", $usuario,$contrasena); 
    //if($conexion){echo "Conectado... a sistema";}
} catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }

?>