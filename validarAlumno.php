<?php 
include ("conexion.php");

$Matricula_Alumno = $_POST['matricula_alumno'];
$contrasena_Alumno = $_POST['contrasena_alumno'];

$queryAlumno = "Select * FROM Alumno WHERE Matricula_Alumno = '$Matricula_Alumno'";

$resAlumno = mysqli_query($conexion_BD, $queryAlumno);

$alumno = mysqli_fetch_array($resAlumno);


    $_SESSION['alumno'] = $alumno;
    var_dump($_SESSION['alumno']);

if ($matricula_alumno == $alumno['matricula_alumno'] ) {
  if (password_verify($contrasena_alumno, $alumno['contrasena_alumno']) ) {
    session_start();
    $_SESSION['matricula_alumno'] =  $alumno['matricula_alumno'];
    $_SESSION['alumno'] = $alumno;
    //var_dump($_SESSION['alumno']);


    header("location: Inicioalumno.php");
  }else{
    echo '<script>
         alert("Contraseña incorrecta");
         window.history.go(-1);
         </script>';
  }

}else {
  echo '<script>
       alert("Matricula no registrada");
       window.history.go(-1);
       </script>';
}





 ?>