<?php 
include("conexion.php");



$Ubicacion =$_POST['Ubicacion'];

$sql = "SELECT Id_Ubicacion FROM Ubicacion WHERE Nombre_Ubicacion = '$Ubicacion'";
$query = mysqli_query($conexion_BD, $sql);
$array = mysqli_fetch_array($query);

$IdUbicacion = $array['Id_Ubicacion'];

$sql2="DELETE  FROM Ubicacion where  Id_Ubicacion = '$IdUbicacion'";


$ejecutar=mysqli_query($conexion_BD, $sql2);
if(!$ejecutar){
    echo"Error al eliminar Ubicacion";
}else{
    echo '<script>
    			alert("Ubicacion eliminada correctamente");
    			</script>';
    header("location: Ubicacion.php");
    die();
}






 ?>