<?php
    session_start();
    include_once("../conexion.php");

    

    if(isset($_POST['correo']) || isset($_POST['contraseña']) || isset($_POST['nombre']) || isset($_POST['apellido']) || isset($_POST['rut']) || isset($_POST['direccion']) || isset($_POST['nacimiento']) || isset($_POST['profesion'])){
        if(mysqli_connect_error()){
            die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());

        }
        else{
            
            $foto= addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
              
            $SELECT = sprintf('SELECT correo from usuario where correo = "%s" limit 1', $_POST['correo']);
            $INSERT = sprintf(
                'INSERT INTO usuario (correo,contrasenia,nombre,apellido,rut,direccion,fehcaNacimiento,profesion,fotoPerfil) values ("%s","%s","%s","%s","%s","%s","%s","%s","%s")',
                $_POST['correo'],
                $_POST['contraseña'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['rut'],
                $_POST['direccion'],
                $_POST['nacimiento'],
                $_POST['profesion'],
                $foto
            );
            $result = $conexion->query($SELECT);
            if ($result->num_rows == 0 ){
                if ($conexion->query($INSERT)){
                    $_SESSION["USUARIO"]=$_POST["correo"];
                    $sql="SELECT fotoPerfil FROM usuario WHERE correo ='$correo'";
                    $resultado=$conexion->query($sql);
                    $fila = $resultado->fetch_row();
                    $_SESSION["FOTO"] =$fila[0];
                    header('Location:../index.php');
                    exit();
                }
                else{
                    # no se pudo anadir
                    $_SESSION['registroError'] = 'No se pudo registrar';
                    header('Location:../formulario.php');
                    exit();
                }
            }
            else{
                # ya existe el usuario
                $_SESSION['registroError'] = 'Ya existe un usuario con este correo';
                header('Location:../formulario.php');
                exit();
            }
        }
    }
    else {
        $_SESSION['registroError'] = "Todos los datos son OBLIGATORIOS";
        header('Location:../formulario.php');
        exit();
    }
?>