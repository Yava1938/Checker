<?php
include("conexion.php");

$descripcion = $_POST['descripcion'];
$newEstado = $_POST['newEstado'];

$consulta = "SELECT * FROM Actividad WHERE Descripcion_Actividad ='$descripcion'";
$query = mysqli_query($conexion_BD, $consulta);
$array = mysqli_fetch_array($query);
$id = $array['Id_Actividad'];

if ($newEstado == "Realizado") {
	$Estado = 4;
}elseif ($newEstado == "Pendiente") {
	$Estado = 0;
}


$sql = "UPDATE Actividad SET Estado_Actividad = '$Estado' where  Id_Actividad = '$id'";

$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al concluir";
}else{
    header("location: docenteActividades.php");
    die();
}

?>