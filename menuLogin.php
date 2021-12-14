<html>
    <head>
    <link rel="stylesheet" href="css/estilo.css">
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
                            <ul>
                                <a href="index.php">Cerrar sesion</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
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
                                    <label for="Descripcion">Discripcion de la clase:</label>
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

        <div class="datosMostrar">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Materia</th>
                        <th>Discripcion de la clase</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <?php 
                    include ("conexion.php");
                    // $correo=$_SESSION['USUARIO'];
                    foreach($conexion->query("SELECT materia,descripcion,fecha,id FROM clase WHERE correo='$correo'") as $row) {
                ?>
                <tr>
                    <form action="eliminarClase.php" method="POST">
                        <th><?php echo $row["id"];?></th>
                        <th><?php echo $row["materia"];?></th>
                        <th><?php echo $row["descripcion"];?></th>
                        <th><?php echo $row["fecha"];?></th>
                        <th>
                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">       <!-- Guardar el rut para por si lo van a eliminar  -->
                            <button type="submit" class="botonAccion"><img src="icono/eliminar.png" ></img></button>
                            
                    </form>

                    <!-------------------- Modificar --------------------->
                    <button type="buttom" class="botonAccion" data-toggle="modal" data-target="#modificar"><img src="icono/modificar.png" ></img></button>
                            <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            </form> 
                                        </form> 
                                    </div>
                                </div>
                    <!-------------------- Fin Modificar --------------------->
                            </div>
                        </th>
                    
                </tr>
                <?php } ?>
            </table>
        </div>

    </body>
</html>