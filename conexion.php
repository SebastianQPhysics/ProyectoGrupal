<?php
    $conexion= new mysqli("localhost","root","","proyecto");
    if($conexion){
        // echo "conectado"
    }
    else{
        echo "no conectado"; 
    }
?>