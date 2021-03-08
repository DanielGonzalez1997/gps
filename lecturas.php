<?php

$temperatura = $_GET['temp'];
$humedad = $_GET['hum'];

//echo "La temperatura es: ".$temperatura." <br>La humedad es: ".$humedad;

$usuario = "soporte";
$contrasena = "chanel";
$servidor = "localhost";
$basededatos = "proyecto";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena ,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");

$fecha = date("Y-m-d");
$consulta = "INSERT INTO datos (fecha, temperatura, humedad) VALUES ('".$fecha."',".$temperatura.", ".$humedad.")";

$resultado = mysqli_query( $conexion, $consulta );

?>

