<?php include("conexion.php"); ?>
<?php
session_start();
if (isset($_SESSION['docente'])) {
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ChecherApp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">CheckerApp</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <div class="container">
                  <a href="perfilDocente.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"><h5>Inicio</h5></a>
                  <a href="docenteActividades.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"><h5>Actividades</h5></a>
                  <a href="docenteReportes.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"><h5>Reportes</h5></a>
                  <h2><div class="dropdown ">
                    <button style="color:#4EC39E" class="btn btn-succes dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php
                      $nombre = $_SESSION['docente']['Nombre_Docente'];
                      echo $nombre; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="PerfilDocente.php">Perfíl</a>
                      <a class="dropdown-item" href="Ubicacion.php">Ubicación</a>
                      <hr>
                      <a class="dropdown-item" href="cerrarSesionDocente.php">Cerrar sesión</a>
                    </div></h2>
                  </div>
                </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="Nosotros">
            <div class="container">
      <div class="textoPrincipal" style="text-align: center; margin-top:10px;"><br>
        <h2>Ubicaciones</h2>
        <hr>
      </div>
            <div class="row mt-5 pt-3">
        <?php
        $query = "SELECT * FROM Ubicacion";
        $resultadoUbicacion = mysqli_query($conexion_BD, $query);
        $estado = "";
        while ($card = mysqli_fetch_array($resultadoUbicacion)) {                ?>
          <div class="col-sm-4  mb-3" style="width: 18rem;">
            <div class="card-header bg-secondary " style="color: white;">Ubicación No. <?php echo $card['0'];?></div>
            <div class="card-body">
              <?php $foto = $card['3'];
                $descrip = $card['2']; ?>
                <h5 class="card-title"><?php echo "<img src='data:image/jpeg; base64," . base64_encode($foto) . "' width='250px'"  ?></h5>
            </div>
            <div class="card-footer">
              <h5 class="card-title"><?php echo $card['1'] ?></h5>
              <p class="card-text">Descripción: <?php echo $descrip ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
  </div>
<!--Opciones-->
<center>
        <div class="btn-group" role="group" aria-label="Basic example" style="margin: 5px;">

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Ubicación
          </button>

          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Eliminar Actividad
          </button>

        </div>

      </center>
<!--Fin Opciones--> 

<!--Agregar ubicación -->
<div class="container mt-2 pt-2">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="registrarUbicacion.php" method="POST" enctype="multipart/form-data">
                <p>Ingresa los datos requeridos para registrar una nueva ubicación.</p>
                <hr>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre de la ubicación:</label>
                  <input type="text" class="form-control" id="recipient-name" name="ubicacion" placeholder="Ej. La Cueva">
                </div>

                <div class="form-group">
                  <label for="message-text" class="col-form-label">Descripcion de la ubicación:</label>
                  <textarea class="form-control" id="message-text" name="descripcion" placeholder="Ej. El mejor lugar."></textarea>
                </div>

                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image">
                    <label class="custom-file-label" for="inputGroupFile04">Selecciona la imagen a cargar...</label>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <input type="submit" value="Registrar ubicación" class="btn btn-primary" name="submit">
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<!--Fin Agregar ubicación -->       

<!--Eliminar ubicación -->
        <div class="container mt-2 pt-2">
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Actividad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <form action="eliminarUbicacion.php" method="post">
                      <p>Selecciona el número de la ubicación a eliminar.</p>
                      <label for="recipient-name" class="col-form-label">N. de ubicación:</label>

                      <?php
                      $consulta = "SELECT * FROM Ubicacion";
                      $query = mysqli_query($conexion_BD, $consulta); ?>
                      <select name="Ubicacion">
                        <?php while ($Ubi = mysqli_fetch_assoc($query)) { ?>
                          <option> <?php echo $Ubi['Nombre_Ubicacion'] ?></option>
                        <?php } ?>
                      </select>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--Fin eliminar ubicación -->
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                            Av Universidad Veracruzana, Paraiso Coatzacoalcos,
                            <br />
                            96538 Coatzacoalcos, Ver.
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociales</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://es-la.facebook.com/UV-Regi%C3%B3n-Veracruz-199921303420787/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/saraldeg?lang=es"><i class="fab fa-fw fa-twitter"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">WaterMelon Co.</h4>
                        <p class="lead mb-0">
                            Desarrollo de sistemas multiplataformas.
                            <a href="https://es-la.facebook.com/yael.vargas.75685">WM C</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © WaterMelon Co. 🍉  2020</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php }elseif (isset($_SESSION['alumno'])) {
    header("location: perfilAlumno.php");
}else{
    header("location: index.php");
}
?>