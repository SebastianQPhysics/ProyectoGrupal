<?php
    session_start();
    $materia=$_POST["materia"];
    $fecha=$_POST["fecha"];
    $descripcion=$_POST["descripcion"];
    $id=$_POST["id"];
    include ("conexion.php");
    $query="UPDATE clase SET materia='$materia',descripcion='$descripcion',fecha='$fecha' WHERE id=$id";
    if ($conexion->query($query) === TRUE) {
        // echo "Solicitud enviada correctamente";
        include "menuLogin.php";
    }
    else{
        echo "error";
    }
?>