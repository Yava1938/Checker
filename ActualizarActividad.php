<?php 
include("conexion.php");

$id_actividad =$_POST['id'];
$descripcion_actividad    =$_POST['descripcion'];
$ubicacion  =$_POST['ubicacion'];
$prioridad    =$_POST['prioridad'];


if (empty($_POST['descripcion'] && empty($_POST['ubicacion'] && empty($_POST['prioridad'])))) {
	echo "Datos no validos:(";
}
else{

$consulta = "SELECT * FROM Ubicacion WHERE Nombre_Ubicacion = '$ubicacion'";
$query = mysqli_query($conexion_BD, $consulta);
$array = mysqli_fetch_array($query);
$id = $array['Id_Ubicacion'];

$sql="UPDATE Actividad SET Descripcion_Actividad = '$descripcion_actividad', Id_Ubicacion = '$id', Prioridad = '$prioridad' where  Id_Actividad = '$id_actividad'";


$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al actualizar";
}else{
    echo '<script>
    			alert("Actividad registrada correctamente");
    			</script>';
    header("location: docenteActividades.php");
    die();
}

} 

 ?>