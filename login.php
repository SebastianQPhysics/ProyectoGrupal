<?php
    include_once 'conexion.php';
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sql="SELECT nombre FROM usuario WHERE nombre LIKE '$usuario' and contrasenia LIKE '$contrasenia'";
    $resultado=$conexion->query($sql);
    if ($resultado->num_rows === 0) {
        include_once "index.php";
    }
    else{
        $_SESSION["USUARIO"]= $usuario;
        include_once "menuLogin.php";
    }

?>