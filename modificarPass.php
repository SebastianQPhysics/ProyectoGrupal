<?php
    session_start();
    $pass=$_POST["pass"];
    $pass2=$_POST["confirmarPass"];
    if ($pass=== $pass2){
        include ("conexion.php");
        $correo=$_SESSION['USUARIO'];
        $query="UPDATE usuario SET contrasenia='$pass' WHERE correo ='$correo'";
        $conexion->query($query);
    }

    header("location: perfil.php");
?>