<?php
include("conexion.php");

$Id_Actividad = $_POST['idActividad'];

$sql = "UPDATE Actividad SET Estado_Actividad = '1' where  Id_Actividad = '$Id_Actividad'";

$ejecutar=mysqli_query($conexion_BD, $sql);
if(!$ejecutar){
    echo"Error al concluir";
}else{
    echo '<script>
    			alert("Actividad concluida correctamente");
    			</script>';
    header("location: perfilAlumno.php");
    die();
}

?>