<?php
    session_start();
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $rut=$_POST["rut"];
    $direccion=$_POST["direccion"];
    $fechaNacimiento=$_POST["fechaNacimiento"];

    $profesion=$_POST["profesion"];
    $correo=$_POST["correo"];

    $correoAntiguo=$_SESSION['USUARIO'];

    include ("conexion.php");
    $sql="SELECT count(correo) FROM usuario WHERE correo ='$correo'";
    $resultado=$conexion->query($sql);
    $fila = $resultado->fetch_row();

    // ---------ve si inserto una imagen------------
    $linea='';
    if(is_file(addslashes($_FILES["foto"]["tmp_name"]))){
        $foto= addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
        $linea=", `fotoPerfil` = '$foto'";
        $_SESSION["FOTO"]=$foto;
    }
    // ------------------------------------------

    if ($fila[0] == 0 or $correo==$correoAntiguo) {

        $sql="UPDATE `usuario` SET `nombre`='$nombre',`apellido`='$apellido',`rut`='$rut',`direccion`='$direccion',`fehcaNacimiento`='$fechaNacimiento',
        `profesion`='$profesion' ,`correo`='$correo' $linea WHERE `usuario`.`correo` = '$correoAntiguo';";
        if ($conexion->query($sql)){
            echo 'si';
        }
        else{
            echo 'no';
        }

        $sql="SELECT fotoPerfil FROM usuario WHERE correo ='$correo'";
        $resultado=$conexion->query($sql);
        $fila = $resultado->fetch_row();
        $_SESSION["FOTO"] =$fila[0];

        $query="UPDATE clase SET 'correo'='$correo' WHERE correo ='$correoAntiguo'";
        $conexion->query($query);
        $_SESSION['USUARIO']=$correo;

        header("location: perfil.php");
    }
    else{
        header("location: errorModificar.php");
    }
?>