<?php
    session_start();
    $correo=$_POST["correo"];
    $correo2=$_POST["confirmarCorreo"];
    $correoAntiguo=$_SESSION['USUARIO'];

    include ("conexion.php");
    $sql="SELECT count(correo) FROM usuario WHERE correo ='$correo'";
    $resultado=$conexion->query($sql);
    $fila = $resultado->fetch_row();

    if ($fila[0] == 0) {
        if ($correo=== $correo2){
            $query="UPDATE usuario SET correo='$correo' WHERE correo ='$correoAntiguo'";
            $conexion->query($query);
            $query="UPDATE clase SET 'correo'='$correo' WHERE correo ='$correoAntiguo'";
            $conexion->query($query);
            $_SESSION['USUARIO']=$correo;
            header("location: perfil.php");
        }
    }
    else{
        header("location: correoExistente.php");
    }
    
?>