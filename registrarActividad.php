<?php
include ("conexion.php");

//Recuperacion de valores 
$descripcion_actividad    =$_POST['descripcion'];
$ubicacion  =$_POST['ubicacion'];
$prioridad    =$_POST['prioridad'];



//Consultas de extraccion de datos necesarios

$consultaUbicacion = "SELECT Id_Ubicacion from Ubicacion where Nombre_Ubicacion='$ubicacion'";
//ejecutar consultas
$query2 = mysqli_query($conexion_BD, $consultaUbicacion);
$array2 = mysqli_fetch_array($query2);
$fecha_actividad = date("Y-m-d H:i:s");

session_start();
$idDoc = $_SESSION['alumno']['Id_Docente'];

$id = $_SESSION['alumno']['Id_Alumno'];
$idUbi = $array2['Id_Ubicacion'];

$sql="INSERT INTO Actividad VALUES (null, '$idDoc', '$id','$descripcion_actividad', '$fecha_actividad','$prioridad','$idUbi','0','')";


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al registrar la actividad";
    echo $idDoc;
    
}else{
    header("location: docenteActividades.php");
    die();
}









?>
