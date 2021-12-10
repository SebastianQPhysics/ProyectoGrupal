<?php
    $materia=$_POST["materia"];
    $fecha=$_POST["fecha"];
    $descripcion=$_POST["descripcion"];

    include ("conexion.php");
    $query="INSERT INTO clase( materia,descrpcion,fecha) VALUES ('$materia','$descripcion','$fecha')";
    if ($conexion->query($query) === TRUE) {
        // echo "Solicitud enviada correctamente";
        include "menuLogin.php";
    }
    else{
        echo "error";
    }
?>