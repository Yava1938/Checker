<?php 
include ("conexion.php");

$Matricula_Docente = $_POST['matricula_docente'];
$contrasena_docente = $_POST['contrasena_docente'];

$queryDocente = "Select * FROM Docente WHERE Matricula_Docente = '$matricula_Docente'";

$resDocente = mysqli_query($conexion_BD, $queryDocente);

$docente = mysqli_fetch_array($resDocente);


    $_SESSION['docente'] = $docente;
    var_dump($_SESSION['docente']);

if ($matricula_Docente == $docente['matricula_docente'] ) {
  if (password_verify($contrasena_Docente, $docente['contrasena_docente']) ) {
    session_start();
    $_SESSION['matricula_docente'] =  $docente['matricula_docente'];
    $_SESSION['docente'] = $docente;
    //var_dump($_SESSION['docente']);


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