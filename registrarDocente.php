<?php  
include("conexion.php");

$nombre_docente       =$_POST['nombre_docente'];
$matricula_docente    =$_POST['matricula_docente'];
$correo_docente       =$_POST['correo_docente'];
$contrasena_docente   =$_POST['contrasena_docente'];
$contrasena_docente   = password_hash($contrasena_docente, PASSWORD_DEFAULT);
$id_docente           = $_SESSION['id_docente'];

$sql="INSERT INTO Docente VALUES (null,'$nombre_docente','$matricula_docente','$contrasena_docente','$correo_docente')";

$verificarMatriculaDocente = mysqli_query( $conexion_BD,"SELECT Matricula_Docente FROM Docente WHERE Matricula_Docente = '$matricula_docente'");
$verificarCorreoDocente    = mysqli_query( $conexion_BD,"SELECT Correo_Docente FROM Docente WHERE Correo_Docente = '$correo_docente'");

if (mysqli_num_rows($verificarMatriculaDocente) > 0 ) {
  echo '<script>
       alert("Matrícula ya registrada");
       window.history.go(-1);
  </script>';
}elseif (mysqli_num_rows($verificarCorreoDocente) > 0) {
  echo '<script>
       alert("Correo ya registrado");
       window.history.go(-1);
  </script>';
}else {
    $ejecutar=mysqli_query($conexion_BD, $sql);
    $consultaID = "SELECT Id_Docente as id from Docente WHERE Matricula_Docente='$matricula_docente' ";
    $queryID = mysqli_query($conexion_BD, $consultaID);
    $arrayID = mysqli_fetch_array($queryID);
    if(!$ejecutar){
            echo"Error al registrar el usuario";
        }else{
           session_start();
           header("location: perfilDocente.php");
    		die();
        }
}
?>