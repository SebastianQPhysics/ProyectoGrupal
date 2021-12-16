<?php
    session_start();
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
                <h3>Error en cambiar Correo</h3>
                <form action="modificarCorreo.php" method="post">
                    <button type="button" class="btn btn-primary" id="btnModificarCorreo" data-toggle="modal" data-target="#modificarCorreo">Modificar Correo</img></button>   
                    <div class="modal" id="modificarCorreo" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cambiar Correo</h5>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" id="modalModificar">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <label for="correo">Ingrese Correo:</label>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <input type="email" name="correo" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <label for="Confirmar Correo">Confirmar Correo:</label>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <input type="email" name="confirmarCorreo"   required>  
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <form action="modificarPass.php" method="post">
                    <button type="button" class="btn btn-primary" id="btnModificarPass" data-toggle="modal" data-target="#modificarPass">Modificar Contraseña</img></button>   
                    <div class="modal" id="modificarPass" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cambiar Contraseña</h5>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" id="modalModificar">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <label for="Pass">Ingrese Contraseña:</label>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <input type="password" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <label for="Fecha">Confirmar Contraseña:</label>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <input type="password" name="confirmarPass"   required>  
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>