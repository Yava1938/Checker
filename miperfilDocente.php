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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}


button:hover, a:hover {
  opacity: 0.7;
}
</style>

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
        <section class="page-section portfolio" id="Nosotros"><br><br>
          <h2 style="text-align:center">Perfil Docente</h2>
            <div class="card">
            <p>
              <img src="assets/img/user.png" alt="John" style="width:40%">
            </p>
            <h1><?php $nombre = $_SESSION['docente']['Nombre_Docente'];
            echo $nombre; ?></h1>
            <p class="title"><?php $nombre = $_SESSION['docente']['Matricula_Docente'];
            echo $nombre; ?></p>
            <p class="title"><?php $nombre = $_SESSION['docente']['Correo_Docente'];
            echo $nombre; ?></p>
            </div>
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