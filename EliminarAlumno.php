<?php 
include("conexion.php");



$id_alumno =$_POST['estudiante'];




session_start();          
   

if (empty($_POST['estudiante'])) {
	echo "Datos no validos:(";
}
else{

$sql="DELETE FROM Alumno where  Id_Alumno = '$id_alumno'";


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al Eliminar";
}else{
    header("location: perfilDocente.php");
    die();
}

} 




 ?>