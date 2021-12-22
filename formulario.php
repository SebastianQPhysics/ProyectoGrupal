<?php
    session_start();

    if (isset($_SESSION['registroError'])){
        echo sprintf('<script language="javascript">alert("%s");window.location.href="index.php"</script>', $_SESSION['registroError']);
        unset($_SESSION['registroError']);
      }
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="css/formulario.css" rel="stylesheet">

    <title>Contacto</title>
  </head>
  <body>
      <!--Header-->
      <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="imagen/logo1.png" style="height: 75px" class="w-100">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="nosotros.php">Nosotros</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Registrarse <span class="sr-only">(current)</span></a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link text-login" href="#" data-toggle="modal" data-target="#modalLogin">Login</a>
              </li>-->
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
   <section class="contact-box">
       <div class="row no-gutters justify-content-center bg-dark"> 
           <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <h1 class="font-weight-bold mb-3">Registrate</h1>
                    
                    <p class="text-muted mb-5">Ingresa la siguiente información para registrarte.</p>

                    <form action="crud/registrarUsuario.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electronico</label>
                        <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Enter email" name="correo" required>
                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="contrasenia" placeholder="Password" name="contraseña" required>
                      </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nombre <span class="text-danger">*</span></label>
                                <input type="text" id="nombre"class="form-control" placeholder="Tu nombre" name="nombre" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Apellido <span class="text-danger">*</span></label>
                                <input type="text" id="apellido"class="form-control" placeholder="Tu apellido" name="apellido" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Rut/ID <span class="text-danger">*</span></label>
                            <input type="number" id="rut"class="form-control" placeholder="Ingresa tu número de identificación o RUT" name="rut" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Dirección <span class="text-danger">*</span></label>
                            <input type="text" id="direccion"class="form-control" placeholder="Ingresa tu dirección" name="direccion" required>
                        </div>
                        <!--<div class="form-group mb-3">
                            <label class="font-weight-bold">Sexo <span class="text-danger">*</span></label>
                            <select class="custom-select custom-select-lg mb-3" name="sexo" required>
                                <option class="form-control" selected hidden value="">Eligue opción</option>
                                <option class="form-control" value="1">Hombre</option>
                                <option class="form-control" value="2">Mujer</option>
                                <option class="form-control" value="3">No binario</option>
                              </select>
                        </div>-->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Ingrese su fecha de nacimiento <span class="text-danger">*</span></label>
                            <input type="date" id="fecha_nacimiento" name="nacimiento" required
                                value="2018-07-22"
                                max="2021-11-09">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Profesion<span class="text-danger">*</span></label>
                            <input type="text" id="profesion" class="form-control" placeholder="Ingresa tu profesion" name="profesion" required>
                        </div>
                        <div class="form-group mb-3">
                        <label class="direccion">Foto de Perfil</label>
                            <br>
                            <input type="file" class="form-control" placeholder="Foto de perfil" name="foto" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary width-100">Regístrate</button>
                    </form>
                    
                </div>
           </div>
       </div>
   </section>
   <!--Footer-->
   <footer>
       <p></p>
        <!--<p>
            Sebastián Paz - Herramientas de desarrollo web - 2021
        </p>-->
    </footer>
    <!--/Footer-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  
  
  
  
  
  
  </body>
</html>