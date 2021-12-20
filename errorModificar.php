<?php
    session_start();
    include "conexion.php";
    $correo=$_SESSION['USUARIO'];
    $sql="SELECT nombre, apellido, rut, direccion, fehcaNacimiento, profesion FROM usuario WHERE correo='$correo' ";
    $resultado=$conexion->query($sql);
    $fila = $resultado->fetch_row();
?>

<html>
    <head>
        <link rel="stylesheet" href="css/estilo.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <header>
            <div class="container" >
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="header-top-right">
                            <a>
                                <?php
                                    $correo=$_SESSION['USUARIO'];
                                    echo "Usuario: ",$correo;
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="header-top-right text-right">

                                <a href="cerrarSesion.php">Cerrar sesion</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div id="sidebar-container" class="bg-primary">
                    <div class="menu">
                        <a href="perfil.php" class="d-block text-light p-3">Perfil</a>
                        <a href="menuLogin.php" class="d-block text-light p-3">Clases</a>
                    </div>              
                </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-10" id="perfilModificar">
                <h1>Modificar Perfil</h1>
                <hr size="2px" color="black"/>
                <h3 class="error">Hubo un error verifique los datos</h3>
                <hr size="2px" color="black"/>
                <h3>Datos</h3>             
                <form action="modificarPerfil.php" method="post" enctype="multipart/form-data">
                    <div class="row pt-3">
                        <div class="col-md-3 col-sm-12 col-xs-12">                      
                            <label class="nombre">Nombre</label>
                            <br>
                            <input type="text" name="nombre" value='<?php echo $fila[0];?>' required> 
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="apellido">Apellido</label>
                            <br>
                            <input type="text" name="apellido" value='<?php echo $fila[1];?>' required>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="rut">Rut</label>
                            <br>
                            <input type="text" name="rut" value='<?php echo $fila[2];?>' required>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="direccion">Direccion</label>
                            <br>
                            <input type="text" name="direccion" value='<?php echo $fila[3];?>' required>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-3 col-sm-12 col-xs-12">                      
                            <label class="fechaNacimiento">Fecha de Nacimiento</label>
                            <br>
                            <input type="date" name="fechaNacimiento" value='<?php echo $fila[4];?>' format required>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="profesion">Profesion</label>
                            <br>
                            <input type="text" name="profesion" value='<?php echo $fila[5];?>' required>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="correo">Correo</label>
                            <br>
                            <input type="email" name="correo" value="<?php echo $correo;?>"  required>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <label class="direccion">Foto de Perfil</label>
                            <br>
                            <input type="file" name="foto">
                        </div>
                    </div>
                    <center><button type="submit" class="btn btn-primary mt-5 mb-5">Confirmar</button></center>
                </form>
                <hr size="2px" color="black"/>
                <h3>Contraseña</h3>
                <form action="modificarPass.php" method="post">
                    <div class="row pt-4">
                            <div class="col-md-6 col-sm-12 col-xs-12">                      
                                <label>Contraseña</label>
                                <br>
                                <input type="password" name="pass" required>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Confirmar Contraseña</label>
                                <br>
                                <input type="password" name="confirmarPass" required>  
                            </div>
                    </div>
                    <center><button type="submit" class="btn btn-primary mt-5 mb-5">Confirmar</button></center>
                </form>
            </div>
        </div>
    </body>
</html>