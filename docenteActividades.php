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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
                      <a class="dropdown-item" href="miperfilDocente.php">Perfíl</a>
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
        <h2>Actividades</h2>
        <hr>
      </div>
            <div class="container">
      <div class="container">
        <center>
            <div class="table-responsive">
          <table class="table" id="actividades">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Responsable</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>

            <?php
            $idDoc = $_SESSION['docente']['Id_Docente'];
            $sql = "SELECT ac.Id_Actividad, al.Nombre_Alumno, ac.Prioridad, ac.Descripcion_Actividad, ac.Fecha_Actividad, u.Nombre_Ubicacion, ac.Estado_Actividad FROM Actividad ac, Alumno al, Ubicacion u WHERE ac.Id_Alumno = al.Id_Alumno AND ac.Id_Ubicacion = u.Id_Ubicacion  AND ac.Id_Docente = '$idDoc' AND Estado_Actividad != '3' AND Estado_Actividad != '4' ORDER BY Id_Actividad ASC";
            $resultadoActividades = mysqli_query($conexion_BD, $sql);
            while ($tab = mysqli_fetch_array($resultadoActividades)) {    ?>

              <tbody>
                <tr>
                  <th scope="row"><?php echo $tab['Id_Actividad'] ?></th>
                  <td><?php echo $tab['Descripcion_Actividad'] ?></td>
                  <td><?php echo $tab['Fecha_Actividad'] ?></td>
                  <td><?php echo $tab['Nombre_Ubicacion'] ?></td>
                  <td><?php echo $tab['Prioridad'] ?></td>
                  <td><?php echo $tab['Nombre_Alumno'] ?></td>
                  <td><?php if ($tab['Estado_Actividad'] == 0) {
                    $estado = "Pendiente";
                  }elseif ($tab['Estado_Actividad'] == 1) {
                    $estado = "En curso";
                  }elseif ($tab['Estado_Actividad'] == 2) {
                    $estado = "En Pausa";
                  }elseif ($tab['Estado_Actividad'] == 3) {
                    $estado = "Esperando evaluación";
                  }else{
                    $estado = "Realizado";
                  }
                  echo $estado ?></td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
          </div>
        </center>
      </div>



      <center>
        <div class="btn-group" role="group" aria-label="Basic example" style="margin: 5px;">

          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Actividad
          </button>


          <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal0" data-whatever="@mdo">Editar Actividad
          </button>


          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Eliminar Actividad
          </button>

        </div>

      </center>

      <div class="textoPrincipal" style="text-align: center; margin-top:10px;"><br>
        <h2>Actividades Finalizadas</h2>
        <hr>
      </div>
            <div class="container">
      <div class="container">
        <center>
            <div class="table-responsive">
          <table class="table" id="actividades">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Responsable</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>

            <?php
            $idDoc = $_SESSION['docente']['Id_Docente'];
            $sql = "SELECT ac.Id_Actividad, al.Nombre_Alumno, ac.Prioridad, ac.Descripcion_Actividad, ac.Fecha_Actividad, u.Nombre_Ubicacion, ac.Estado_Actividad, ac.Observacion_Actividad FROM Actividad ac, Alumno al, Ubicacion u WHERE ac.Id_Alumno = al.Id_Alumno AND ac.Id_Ubicacion = u.Id_Ubicacion  AND ac.Id_Docente = '$idDoc' AND Estado_Actividad ='3' ORDER BY Id_Actividad ASC";
            $resultadoActividades = mysqli_query($conexion_BD, $sql);
            while ($tab = mysqli_fetch_array($resultadoActividades)) {    ?>

              <tbody>
                <tr>
                  <th scope="row"><?php echo $tab['Id_Actividad'] ?></th>
                  <td><?php echo $tab['Descripcion_Actividad'] ?></td>
                  <td><?php echo $tab['Fecha_Actividad'] ?></td>
                  <td><?php echo $tab['Nombre_Ubicacion'] ?></td>
                  <td><?php if ($tab['Prioridad'] == 1) {
                    $prioridad = "Baja";
                  }elseif ($tab['Prioridad'] == 2) {
                    $prioridad = "Media";
                  }elseif ($tab['Prioridad'] == 3){
                    $prioridad ="Alta";
                  }
                  echo $prioridad ?></td>
                  <td><?php echo $tab['Nombre_Alumno'] ?></td>
                  <td><?php if ($tab['Estado_Actividad'] == 3) {
                    $estado = "Esperando evaluación";
                  }
                  echo $estado ?></td>
                  <td><?php echo $tab['Observacion_Actividad'] ?></td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
          </div>
        </center>
      </div>

      <center>
        <div class="btn-group" role="group" aria-label="Basic example" style="margin: 5px;">

          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">Evaluar Actividad
          </button>

        </div>

      </center>


      <!--Agregar una nueva actividad -->
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

              <div class="modal-body" style="padding-top: 20px;">
                <form action="AgregarActividad.php" method="post">
                  <p>Ingresa los datos requeridos para registrar una nueva actividad.</p>
                  <hr>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Descripción de la actividad:</label>
                    <input type="text" class="form-control" id="recipient-name" name="descripcion" placeholder="Ej. Terminar el desarrollo.">
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Ubicación de la actividad:</label>
                    <br>
                    <?php
                    $consulta = "SELECT * FROM Ubicacion";
                    $query = mysqli_query($conexion_BD, $consulta); ?>
                    <select name="ubicacion">
                      <?php while ($ubicaciones = mysqli_fetch_assoc($query)) { ?>
                        <option> <?php echo $ubicaciones['Nombre_Ubicacion'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Estudiante responsable:</label>
                    <br>
                    <?php
                    $idDoc = $_SESSION['docente']['Id_Docente'];
                    $consulta = "SELECT Nombre_Alumno as nombre FROM Alumno WHERE Id_Docente = '$idDoc'";
                    $query = mysqli_query($conexion_BD, $consulta); ?>
                    <select name="estudiante_asignado">
                        <option>      </option>
                        <?php while ($asignarEstudiante = mysqli_fetch_assoc($query)) { ?>
                        <option> <?php echo $asignarEstudiante['nombre'] ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Prioridad de la actividad: </label>
                    <select name="prioridad">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                    <br>
                    <p>Nota: La escala de Prioridad es la siguiente:<br> 1.- Prioridad Baja<br> 2.- Prioridad Media<br> 3.- Prioridad Alta</p>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Fin Agregar una nueva activida-->

        <!-- Editar una actividad -->
        <div class="container mt-2 pt-2">

        <div class="modal fade" id="exampleModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-warning dark-white">
                <h5 class="modal-title" id="exampleModalLabel">Editar Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body" style="padding-top: 20px;">
                <form action="ActualizarActividad.php" method="post">
                  <p>Ingresa los datos requeridos para editar la actividad.</p>
                  <hr>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Número de actividad:</label>
                    <br>
                    <?php
                    $yo = $_SESSION['docente']['Id_Docente'];
                    $consulta = "SELECT * FROM Actividad WHERE Id_Docente = '$yo' AND Estado_Actividad = '0'";
                    $query = mysqli_query($conexion_BD, $consulta); ?>
                    <select name="id">
                      <?php while ($actividad = mysqli_fetch_assoc($query)) { ?>
                        <option> <?php echo $actividad['Id_Actividad'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nueva descripción de la actividad:</label>
                    <input type="text" class="form-control" id="recipient-name" name="descripcion" placeholder="Ej. Terminar el desarrollo.">
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Ubicación de la actividad:</label>
                    <br>
                    <?php
                    $consulta = "SELECT Nombre_Ubicacion FROM Ubicacion";
                    $query = mysqli_query($conexion_BD, $consulta); ?>
                    <select name="ubicacion">
                      <?php while ($ubicacion = mysqli_fetch_assoc($query)) { ?>
                        <option> <?php echo $ubicacion['Nombre_Ubicacion'] ?> </option>

                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Prioridad de la actividad: </label>
                    <select name="prioridad">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                    <br>
                    <p>Nota: La escala de Prioridad es la siguiente:<br> 1.- Prioridad Baja<br> 2.- Prioridad Media<br> 3.- Prioridad Alta</p>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Actualizar Actividad</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Fin Editar una actividad-->



        <!-- Eliminar una actividad-->
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
                    <form action="EliminarActividad.php" method="post">
                      <p>Selecciona el número de actividad a eliminar.</p>
                      <label for="recipient-name" class="col-form-label">N. de Actividad:</label>

                      <?php
                      $consulta = "SELECT * FROM Actividad";
                      $query = mysqli_query($conexion_BD, $consulta); ?>
                      <select name="descripcion">
                        <?php while ($actividades = mysqli_fetch_assoc($query)) { ?>
                          <option> <?php echo $actividades['Descripcion_Actividad'] ?></option>
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

        <!-- Fin Eliminar una actividad-->
        <!-- Evaluar una actividad-->
        <div class="container mt-2 pt-2">
          <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-light text-dark">
                  <h5 class="modal-title" id="exampleModalLabel">Evaluar Actividad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <form action="EvaluarActividad.php" method="post">
                      <p>Selecciona el número de actividad a evaluar.</p>
                      <label for="recipient-name" class="col-form-label">N. de Actividad:</label>

                      <?php
                      $consulta = "SELECT * FROM Actividad WHERE Estado_Actividad ='3'";
                      $query = mysqli_query($conexion_BD, $consulta); ?>
                      <select name="descripcion">
                        <?php while ($actividades = mysqli_fetch_assoc($query)) { ?>
                          <option> <?php echo $actividades['Descripcion_Actividad'] ?></option>
                        <?php } ?>
                      </select><br>
                      <label for="recipient-name" class="col-form-label">Cambiar estado a:</label>
                      <select class="form-control" name = "newEstado">
                        <option >Realizado</option>
                        <option >Pendiente</option>
                      </select>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Evaluar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Evaluar una actividad-->
      </div>
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