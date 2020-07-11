<?php
include("conexion.php");

$nombre_alumno    = $_POST['nombre'];
$matricula_alumno = $_POST['matricula'];
$licenciatura         = $_POST['licenciatura'];
$facultad             = $_POST['facultad'];
$contrasena           = $_POST['contrasena'];
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

//if (session_start()) {
  //    $query = "SELECT id_docente,nombre_docente  FROM docentes where matricula = '$matricula_Docente'";
    //          $resultadoUsuario = mysqli_query($conexion_BD, $query);
      //        $datos = mysqli_fetch_array($resultadoUsuario)) 
session_start();          
   
$Id_doc = $_SESSION['docente']['Id_Docente'];
//var_dump($MATRICULA);
$sql="INSERT INTO Alumno VALUES (null,'$nombre_alumno','$matricula_alumno','$licenciatura','$facultad',$Id_doc,'$contrasena','0');";


$verificarMatriculaalumno = mysqli_query( $conexion_BD, "SELECT matricula_alumno FROM Alumno WHERE Matricula_Alumno='$matricula_alumno'");


if (mysqli_num_rows($verificarMatriculaalumno) > 0 ) {
  echo '<script>
       alert("Matrícula ya registrada");
       window.history.go(-1);
  </script>';
}else {
    $ejecutar=mysqli_query($conexion_BD, $sql);
    if(!$ejecutar){
            echo"Error al registrar el usuario";
        }else{
           echo '<script>
    			 			alert("Usuario registrado correctamente");
    			      </script>';
           header("location: perfilDocente.php");
    		die();
        }
}

 


 ?>
