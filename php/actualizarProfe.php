<?php
    session_start();
    //Se comprueba que las variables a utilizar estan definidas
    if(isset($_SESSION['usuario']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['apellidos']) && isset($_POST['nickname'])){
        require_once('configuracionDB.php');
        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

        $sql_update= "UPDATE ".TABLA_USUARIO ." SET nombre='".$_POST['nombre'] . "', "
                . "apellidos='".$_POST['apellidos']."', email='".$_POST['email']."' WHERE nickname='".$_POST['nickname']."'";
        //se hace la actualización
        if ( $conexion->query($sql_update)){
            echo "El usuario se ha modificado";
            if($_SESSION['tipo']==0){
                echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
            }else {
                echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
            }
        }else{
            echo "El usuario no se ha podido modificar";
            if($_SESSION['tipo']==0){
                echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
            }else {
                echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
            }
        }
        $conexion->close();
    }else{
        echo "El usuario no se ha podido modificar, los datos no son correctos";
        if($_SESSION['tipo']==0){
            echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
        }else {
            echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
        }
    }
?>