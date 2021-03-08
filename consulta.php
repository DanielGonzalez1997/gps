<?php
$Fecha_inicial = $_POST['Fecha_inicial'];
$Fecha_final = $_POST['Fecha_final'];

$usuario = "soporte";
$contrasena = "chanel";
$servidor = "localhost";
$basededatos = "proyecto";
$tabla1 ="";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena ,$basededatos ) or die ("No se ha podido conectar al servidor de Base de datos");

$sql = "SELECT * FROM datos where fecha >='".$Fecha_inicial."' and fecha <= '".$Fecha_final."'";
if($result  = mysqli_query($conexion, $sql)){
	$tabla1 ="<table id='tableDatos' class='display' border='0'>
			<thead style='background color;'>
				<td>id </td>
				<td>Fecha: </td>
				<td>Temperatura: </td>
				<td>Humedad: </td>

			</thead><tbody>	";	
	while ($row = mysqli_fetch_assoc($result)) 
	{	$id=$row['id'];
		$fecha=$row['fecha'];
		$temperatura=$row['temperatura'];
		$humedad=$row['humedad'];
		$tabla1 .= "

					<tr style='text-align:center;'>
					<td>" . $id . "</td>
					<td>" . $fecha . "</td>
					<td>" . $temperatura . "</td>
					<td>" . $humedad . "</td>
					</tr>";
	
	}
	$tabla1.="</tbody></table>";
}
echo $tabla1;
?>
