<?php
    session_start();

    if (!isset($_SESSION['USUARIO'])){
        header ("location: index.php");
    }
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
                <div class="col-md-8 col-sm-8 col-xs-8 d-flex justify-items-between align-items-center">
                    <a href="index.php"><img class="mr-4" src="imagen/logo1.png" style="height: 75px"></a>
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

                        <img class="fotoPerfil"src="data:image/jpg;base64,<?php echo base64_encode($_SESSION["FOTO"]); ?>">
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
            <div class="col-md-10 col-sm-10 col-xs-10">
            <div class="principal">
                <h2>Contenido Principal</h2>
                    </div>
                    <div class="botonAnadir">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anadir"> Añadir</button>
                    </div>
                    
                    <!-- Ventana para añadir -->
                    <div class="modal fade" id="anadir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir Clase</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="anadirClase.php" method="POST">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <label for="Materia">Materia:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <input type="text" name="materia" id="materia" required>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <label for="Fecha">Fecha:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <input type="date" name="fecha" id="fecha" value="01-01-2020" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <label for="Descripcion">Descripcion de la clase:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <input type="text" name="descripcion" required>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" name="btnEnviar">Añadir</button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <!-- FIN -->
                    <div class="buscar">
                        <form action="buscarClase.php" method="POST">
                            <input type="text" name="busqueda" placeholder="Buscar">
                            <input type="submit" value="Buscar" class="btnBuscar"></input>
                        </form>
                    </div> 
                    <div class="datosMostrar">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Materia</th>
                                    <th>Descripcion de la clase</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <?php 
                                include ("conexion.php");
                                foreach($conexion->query("SELECT materia,descripcion,fecha,id FROM clase WHERE correo='$correo'") as $row) {
                            ?>
                                <tr>
                                    <form action="eliminarClase.php" method="POST">
                                        <th><?php echo $row["id"];?></th>
                                        <th><?php echo $row["materia"];?></th>
                                        <th><?php echo $row["descripcion"];?></th>
                                        <th><?php echo $row["fecha"];?></th>
                                        <th>
                                            <!-------------------Eliminar ----------------------->
                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                            <button type="button" class="botonAccion" data-toggle="modal" data-target="#eliminar"><img class="imgAccion" src="icono/eliminar.png" ></img></button>   
                                            <div class="modal" id="eliminar" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">¿Desea Confirmar?</h5>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                        <!-------------------- Modificar --------------------->
                                        <button type="buttom" class="botonAccion" data-toggle="modal" data-target="#modificar<?php echo $row["id"];?>"><img class="imgAccion" src="icono/modificar.png" ></img></button>
                                        <div class="modal" id="modificar<?php echo $row["id"];?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modificar Clase</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="ModificarClase.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="row" id="modalModificar">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    <label for="Materia">Materia:</label>
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    <input type="text" name="materia" id="materia" value="<?php echo $row["materia"];?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    <label for="Fecha">Fecha:</label>
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    <input type="date" name="fecha" id="fecha" value="<?php echo $row["fecha"];?>" format required>  
                                                                </div>
                                                            </div>  
                                                            <div class="row" id="modalModificar">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    <label for="Descripcion">Discripcion de la clase:</label> 
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    <input type="text" name="descripcion" value="<?php echo $row["descripcion"];?>" required>  
                                                                </div>
                                                            </div>   
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                            <!-------------------- Fin Modificar --------------------->
                                    </th>
                                    
                                </tr>
                            <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>