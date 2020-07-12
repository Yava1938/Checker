<?php
include("conexion.php");

session_start();
$matricula = $_SESSION['Matricula_Alumno'];
$sql = "UPDATE Alumno SET Estado_Alumno = '0' WHERE Matricula_Alumno ='$matricula'";
$query = mysqli_query($conexion_BD, $sql);

session_destroy();
header("location: index.php");
exit();


 ?>
