<?php
    include_once 'conexion.php';
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
    $sql="SELECT correo,count(correo) FROM usuario WHERE correo ='$usuario' and contrasenia = '$contrasenia'";
    $resultado=$conexion->query($sql);
    $fila = $resultado->fetch_row();
    if ($fila[1] == 0) {
        include_once "index.php";
    }
    else{
        session_start();
        $_SESSION["USUARIO"] = $usuario;
        header ("location: menuLogin.php");
    }
?>