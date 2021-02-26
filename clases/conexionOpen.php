<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $DB = "empresa";
    $tb1 = "usuarios";
    $tb2 = "empleado";

    $conexion = new mysqli($host, $user, $pass, $DB);
    error_reporting(10);

    if ($conexion->connect_errno) {
        echo "No se pudo Obtener conexion a la base de datos";
    }
?>