<?php
include("conexion.php");

$descripcion = $_POST['descripcion'];

$consulta = "SELECT * FROM Actividad WHERE Descripcion_Actividad ='$descripcion'";
$query = mysqli_query($conexion_BD, $consulta);
$array = mysqli_fetch_array($query);
$id = $array['Id_Actividad'];


$sql = "UPDATE Actividad SET Estado_Actividad = '2' where  Id_Actividad = '$id'";

$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al concluir";
}else{
    header("location: docenteActividades.php");
    die();
}

?>