<?php 
include ("conexion.php");

$Matricula_Docente = $_POST['matricula_docente'];
$contrasena_Docente = $_POST['contrasena_docente'];

$queryDocente = "Select * FROM Docente WHERE Matricula_Docente = '$Matricula_Docente'";

$resDocente = mysqli_query($conexion_BD, $queryDocente);

$docente = mysqli_fetch_array($resDocente);

    $_SESSION['docente'] = $docente;
    var_dump($_SESSION['docente']);

if ($Matricula_Docente == $docente['Matricula_Docente'] ) {
  if (password_verify($contrasena_Docente, $docente['contrasena_Docente']) ) {
    session_start();
    $_SESSION['matricula_docente'] =  $docente['matricula_docente'];
    $_SESSION['docente'] = $docente;

    header("location: InicioDocente.php");
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