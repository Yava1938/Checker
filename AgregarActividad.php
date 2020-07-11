<?php
include ("conexion.php");

//Recuperacion de valores 
$descripcion_actividad    =$_POST['descripcion'];
$ubicacion  =$_POST['ubicacion'];
$prioridad    =$_POST['prioridad'];
$estudianteAsignado = $_POST['estudiante_asignado'];
//Consultas de extraccion de datos necesarios
$consultaID = "SELECT Id_Alumno from Alumno where Nombre_Alumno='$estudianteAsignado'";
$consultaUbicacion = "SELECT Id_Ubicacion from Ubicacion where Nombre_Ubicacion='$ubicacion'";
//ejecutar consultas
$query = mysqli_query($conexion_BD, $consultaID);
$query2 = mysqli_query($conexion_BD, $consultaUbicacion);
$array = mysqli_fetch_array($query);
$array2 = mysqli_fetch_array($query2);
$fecha_actividad = date("Y-m-d H:i:s");

session_start();

$id_docente = $_SESSION['docente']['Id_Docente'];
$id = $array['Id_Alumno'];
$idUbi = $array2['Id_Ubicacion'];

$sql="INSERT INTO Actividad VALUES (null, '$id_docente', '$id','$descripcion_actividad', '$fecha_actividad','$prioridad','$idUbi','0')";


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al registrar la actividad";
    echo $id_docente;
    echo $id;
    echo $descripcion_actividad;
    echo $fecha_actividad;
    echo $prioridad;
    echo $idUbi;
}else{
    echo '<script>
    			alert("Actividad registrada correctamente");
    			</script>';
    header("location: docenteActividades.php");
    die();
}









?>
