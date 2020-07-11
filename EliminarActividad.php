<?php 
include("conexion.php");

if (empty($_POST['descripcion'])) {
	echo "Datos no validos:(";
}else{
$descripcion =$_POST['descripcion'];


session_start();          
   
$idDocente = $_SESSION['docente']['Id_Docente'];

$consulta = "SELECT Id_Actividad FROM Actividad WHERE Id_Docente = '$idDocente'";
$query = mysqli_query($conexion_BD, $consulta);
$array = mysqli_fetch_array($query);
$id = $array['Id_Actividad'];

$sql="DELETE  FROM Actividad where  Id_Actividad = '$id'";


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al eliminar actividad";
}else{
    echo '<script>
    			alert("Actividad registrada correctamente");
    			</script>';
    header("location: docenteActividades.php");
    die();
}

} 




 ?>