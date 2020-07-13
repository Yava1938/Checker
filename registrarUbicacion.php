<?php 

include("conexion.php");
session_start();


if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $ubicacion = $_POST['ubicacion'];
		$descripcion = $_POST['descripcion'];
		
        
        
        //Insertar imagen en la base de datos
        $sql="INSERT INTO Ubicacion VALUES (null,'$ubicacion','$descripcion','$imgContenido')";



$verificarUbicacion = mysqli_query( $conexion_BD, "SELECT * FROM Ubicacion WHERE nombre_ubicacion='$ubicacion'");


if (mysqli_num_rows($verificarUbicacion) > 0 ) {
  echo '<script>
       alert("Ubicación ya registrada");
       window.history.go(-1);
  </script>';
}
 $ejecutar=mysqli_query($conexion_BD, $sql);
    if(!$ejecutar){
            echo"Error al registrar la ubicación";
        }else{
           header("location: Ubicacion.php");
    		die();
        }
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}



 ?>