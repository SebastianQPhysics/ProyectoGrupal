<?php
    session_start();
    $id=$_POST["id"];
    include ("conexion.php");
    $query="DELETE FROM clase WHERE id=$id";
    if(!$conexion->query($query)){
        echo "error";
    }
    else{
        header("location:menuLogin.php");
    }
?>