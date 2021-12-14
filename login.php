<?php
    include_once 'conexion.php';
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sql="SELECT nombre FROM usuario WHERE nombre LIKE '$usuario' and contrasenia LIKE '$contrasenia'";
    $resultado=$conexion->query($sql);
    if ($resultado === NULL) {
        include_once "index.php";
    }
    else{
        session_start();
        $_SESSION["USUARIO"] = $usuario;
        header ("location: menuLogin.php");
    }
?>