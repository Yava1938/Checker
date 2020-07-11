<?php 
include ("conexion.php");

$Matricula_Alumno = $_POST['matricula_alumno'];
$contrasena_Alumno = $_POST['contrasena_alumno'];

$queryAlumno = "SELECT * FROM Alumno WHERE Matricula_Alumno = '$Matricula_Alumno'";

$resAlumno = mysqli_query($conexion_BD, $queryAlumno);

$alumno = mysqli_fetch_array($resAlumno);


    $_SESSION['alumno'] = $alumno;
    var_dump($_SESSION['alumno']);

if ($Matricula_Alumno == $alumno['Matricula_Alumno'] ) {
  if (password_verify($contrasena_Alumno, $alumno['Contrasena_Alumno']) ) {
    session_start();
    $_SESSION['Matricula_Alumno'] =  $alumno['Matricula_Alumno'];
    $_SESSION['alumno'] = $alumno;
    //var_dump($_SESSION['alumno']);

    header("location: perfilAlumno.php");
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