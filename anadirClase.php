<?php
    session_start();
    if(isset($_POST["btnEnviar"])){
        $materia=$_POST["materia"];
        $fecha=$_POST["fecha"];
        $descripcion=$_POST["descripcion"];

        include ("conexion.php");
        $correo=$_SESSION['USUARIO'];
        $query="INSERT INTO clase( materia,descripcion,fecha,correo) VALUES ('$materia','$descripcion','$fecha','$correo')";
        if ($conexion->query($query) === TRUE) {
            // echo "Solicitud enviada correctamente";
            header("location: menuLogin.php");
        }
        else{
            echo "error";
        }
    }
?>