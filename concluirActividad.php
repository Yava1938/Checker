<?php
include("conexion.php");

$Id_Actividad = $_POST['idActividad'];
$observaciones = $_POST['observaciones'];

	$sql = "UPDATE Actividad SET Estado_Actividad = '3', Observacion_Actividad = '$observaciones' where  Id_Actividad = '$Id_Actividad'";	


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al concluir";
}else{
    header("location: perfilAlumno.php");
    die();
}

?>