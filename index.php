<?php 
  session_start();
  include_once 'conexion.php';

  function nombreUsuario(){
    if (isset($_SESSION['USUARIO'])){echo '<li class="nav-item"><a target="_blank" class="nav-link" href="menuLogin.php">Panel</a></li>';}  
    else{ 
      echo '<li class="nav-item"><a class="nav-link" href="formulario.php">Registrarse</a></li>';
      echo '<li class="nav-item"><a class="nav-link text-login" href="#" data-toggle="modal" data-target="#modalLogin">Login</a></li>';
    }
    } 
    
  if (isset($_SESSION['loginError'])){
    echo '<script language="javascript">alert("Error de autentificación");window.location.href="index.php"</script>';
    unset($_SESSION['loginError']);
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Noticias de ciencia</title>
  </head>
  <body>
    <!--Header-->
    <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="imagen/logo1.png" alt="Logo personal">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          
      
        
              <?php
                nombreUsuario(); 
              ?>
            
          </ul>
          <!--Formulario de busqueda
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          -->
        </div>
      </div>
    </nav>
    <!--/Header-->

    <!--Main-->
    <main id="main">
      <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imagen/1200x630_blog_webMAESTROONLINE.png" alt="Noticia 1">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagen/5fb287d7df964.jpeg" alt="Noticia 2">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagen/cursos-online-portada.jpg" alt="Noticia 3">
          </div>
        </div>
        <div class="overlay">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 offset-md-6 text-center text-md-right">
                <h1>Encuentra un profesor particular YA!</h1>
                <p class="d-none d-md-block">Aprender nunca fue tan fácil<br>
                </p>
               
              </div>
            </div>
          </div>
        </div>
        <!--Controles del Carousel
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        -->
      </div>
    </section>
    <!--/Main-->

    <!--Carousel Wrapper-->
    
      <div id="multi-item-example" class="carousel slide carousel-multi-item my-5 pt-5" data-ride="carousel">
        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
              class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->
        <div class='d-flex justify-content-center'>
        <h1 class='mb-5'>PROFESORES NUEVOS</h1>
        </div>
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item card-deck active">
              <div class='d-flex justify-content-center'>
                <?php
                  $sql = 'SELECT * FROM usuario ORDER BY fechaRegistro DESC LIMIT 0, 3;';
                  $result = $conexion->query($sql);
                  if ($result->num_rows > 0 && $result->num_rows<=3) {
                      while ($row = $result->fetch_assoc()){
                        echo sprintf(
                          '
                          <div class="col-md-3" style="float:left">
                              <div class="card mb-2">
                                <img class="card-img-top" style="max-height: 350px"
                                    src="data:image/jpg;base64,%s" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">%s %s</h4>
                                    <p class="card-text">%s</p>
                                </div>
                              </div>
                          </div>
                          ',
                          base64_encode($row["fotoPerfil"]),
                          $row['nombre'],
                          $row['apellido'],
                          $row['profesion']
                        );
                      }
                  }
                ?>
              </div>
            </div>
            <div class="carousel-item card-deck">
              <div class='d-flex justify-content-center'>
                  <?php
                    $sql = 'SELECT * FROM usuario ORDER BY fechaRegistro DESC LIMIT 3, 6;';
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0 && $result->num_rows<=3) {
                        while ($row = $result->fetch_assoc()){
                          echo sprintf(
                            '
                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                  <img class="card-img-top" style="max-height: 350px"
                                      src="data:image/jpg;base64,%s" alt="Card image cap">
                                  <div class="card-body">
                                      <h4 class="card-title">%s %s</h4>
                                      <p class="card-text">%s</p>
                                  </div>
                                </div>
                            </div>
                            ',
                            base64_encode($row["fotoPerfil"]),
                            $row['nombre'],
                            $row['apellido'],
                            $row['profesion']
                          );
                        }
                    }
                  ?>
                </div>
              </div>
            <!--/.First slide-->
        </div>
        <!--/.Slides-->
      </div>
    <!--/.Carousel Wrapper-->
    
    <!--Noticias-->
      <section id="cursos" class="mt-5 pt-5">
        <div class="container">
          <div class="row">
            <div class="col text-center text-uppercase mb-5">
                <h1 class='mb-5'>Buscador</h1>
                <div id="browser-bar" class="shadow-lg mb-5">
                    <form action="index.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" aria-label="Text input">
                            <button class="btn btn-primary px-4" type="submit" id="search-button">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="row mb-5">
                <?php
                    $sql = 'SELECT c.*, u.* FROM clase as c
                    INNER JOIN usuario as u ON c.correo = u.correo';
                    if (isset($_GET['search'])){
                        if (!empty($_GET['search'])){
                            $sql = $sql . sprintf(" WHERE materia like '%s%s%s'", '%', $_GET['search'], '%');
                        }
                    }
                    $result = $conexion->query($sql.' ORDER BY fechaCreacion DESC limit 15;');
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo sprintf(
                                '
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img class="card-img-top" src="imagen/img3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">%s</h5>
                                            <p class="card-text">%s</p>
                                            <p class="card-text"><small class="text-muted">%s</small></p>
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#card%s">Leer más</a>
                                        </div>
                                    </div>
                                </div>
                                ',
                                $row['materia'],
                                $row['descripcion'],
                                $row['correo'],
                                $row['id']
                            );
                        }
                    }
                ?>
            </div>
        </div>
      </section>
    <!--/Noticias-->

    <!--Frase de la semana-->
      <section id="frase">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 pl-0 pr-0">
              <img class="img-fluid w-150" src="imagen/mistral.jpg" alt="Marie Curie">
            </div>
            <div class="col-lg-10 pt-2">
              <small>La biografía de la semana</small>
              <h2>Gabriela Mistral</h2>
              <blockquote class="palo">
                <p>
                  <em>“Estudiamos sin amor y aplicamos sin amor las máximas y aforismos de Pestalozzi y Froebel, esas almas tan tiernas, y por eso no alcanzamos lo que alcanzaron ellos.”</em>
                </p>
                <p>
                  <em>“Como todo no es posible retenerlo, hay que hacer que la alumna seleccione y sepa distinguir entre la médula de un trozo y el detalle útil pero no indispensable.”</em>
                </p>
              </blockquote>
              <p>Mistral ejerció la docencias durante casi 20 años en diferentes zonas del país. Fue ahí donde comenzó a trabajar en su poesía. Su labor como profesora fue el cordón umbilical entre su genio literario y los niños, que tanto inspiraron su obra. Mistral ganó el Nobel de Literatura en 1945, convirtiéndose en la primera mujer en recibir este galardón.</p>
              <!--<a class="btn btn-outline-light mb-2" href="https://youtu.be/3tuWzjaQuA4">Conoce más</a>-->
            </div>
          </div>
        </div>
      </section>
    <!--/Frase de la semana-->

    <!--Footer-->
      <footer>
        <p>
          © 2020 Copyright: TodoProfe.com
        </p>
      </footer>
    <!--/Footer-->

   

    <!-- Modal -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Iniciar sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="usuario">
                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="contrasenia">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
              </div>
          </div>
          <div class="modal-footer">
            <a type="submit" href="formulario.php" class="btn btn-secondary">Registrarse</a>
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <?php

      $result = $conexion->query($sql.' ORDER BY fechaCreacion ASC limit 15;');
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()){
              echo sprintf(
                  '
                  <div class="modal fade" id="card%s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">%s</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group mb-5">
                            <label for="exampleFormControlTextarea1">Descripcion</label>
                            <textarea class="form-control" rows="3" readonly>%s</textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Autor</label>
                            <input type="text" class="form-control" value="%s %s" readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Profesion</label>
                            <input type="email" class="form-control" value="%s" readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Contacto</label>
                            <input type="email" class="form-control" value="%s" readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Fecha</label>
                            <input type="date" name="fecha" id="fecha" value="%s" readonly>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  ',
                  $row['id'],
                  $row['materia'],
                  $row['descripcion'],
                  $row['nombre'],
                  $row['apellido'],
                  $row['profesion'],
                  $row['correo'],
                  $row['fecha']
              );
          }
      }

    ?>
    <!--/Modal-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var filtro = "<?php
        if (isset($_GET['search'])){
          if (!empty($_GET['search'])){
              echo $_GET['search'];
          }
      }
      ?>";

      if (filtro){
        document.getElementById('cursos').scrollIntoView();
      }
    </script>
  </body>
</html>