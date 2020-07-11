<?php  
include("conexion.php");


$nombre_docente       =$_POST['nombre_docente'];
$matricula_docente    =$_POST['matricula_docente'];
$correo_docente       =$_POST['correo_docente'];
$contrasena_docente   =$_POST['contrasena_docente'];
$contrasena_docente   = password_hash($contrasena_docente, PASSWORD_DEFAULT);
$id_docente           = $_SESSION['id_docente'];



$sql="INSERT INTO docentes VALUES (null,'$nombre_docente','$matricula_docente','$correo_docente','$contrasena_docente')";

$verificarMatriculaDocente = mysqli_query( $conexion_BD,"SELECT matricula_docente FROM docentes WHERE matricula_docente = '$matricula_docente'");
$verificarCorreoDocente    = mysqli_query( $conexion_BD,"SELECT correo_docente FROM docentes WHERE correo_docente = '$correo_docente'");

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
    //Por default agregamos el color azul (bg-primary) al header

    $ejecutar=mysqli_query($conexion_BD, $sql);
    $consultaID = "SELECT id_docente as id from docentes WHERE matricula_docente='$matricula_docente' ";
    $queryID = mysqli_query($conexion_BD, $consultaID);
    $arrayID = mysqli_fetch_array($queryID);
    $id_color = $arrayID['id'];
    $sqlColor="INSERT INTO colores VALUES (null, '$id_color','bg-primary')";
    $queryColor = mysqli_query($conexion_BD, $sqlColor);
    if(!$ejecutar){
            echo"Error al registrar el usuario";
            echo $nombre_docente;
            echo $matricula_docente;
            echo $contrasena_docente;
        }else{
           session_start();
           header("location: loginDocente.php");
    		die();
        }
}


?>