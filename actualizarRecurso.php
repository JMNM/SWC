<?php
    session_start();
    if(isset($_SESSION['usuario']) && isset($_POST['nombre']) && isset($_POST['asignatura']) && isset($_POST['fecha'])
            && isset($_POST['hora'])&& isset($_POST['duracion'])&& isset($_POST['lugar'])&& isset($_POST['codigo'])){
        require_once('configuracionDB.php');
        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

        $sql_update= "UPDATE ".TABLA_RECURSOS." SET nombre='".$_POST['nombre'] . "', "
                . "asignatura='".$_POST['asignatura']."', fecha='".$_POST['fecha']."',"
                . " hora_inicio='".$_POST['hora']."', duracion=".$_POST['duracion']. ", lugar='".$_POST['lugar']."'"
                . " WHERE codigo='".$_POST['codigo']."'";
        //$conexion->query("SET NAMES 'utf8'");
        if ( $conexion->query($sql_update)){
            echo "El recurso se ha modificado";
            if($_SESSION['tipo']==0){
                echo "<br/><a href=paginaAdmin.php> Volver</a>";
            }else {
                echo "<br/><a href=paginaProfesor.php> Volver</a>";
            }
        }else{
            echo "El recurso no se ha podido modificar";
            if($_SESSION['tipo']==0){
                echo "<br/><a href=paginaAdmin.php> Volver</a>";
            }else {
                echo "<br/><a href=paginaProfesor.php> Volver</a>";
            }
        }
        $conexion->close();
    }else{
        echo "El recurso no se ha podido modificar, los datos no son correctos";
        if($_SESSION['tipo']==0){
            echo "<br/><a href=paginaAdmin.php> Volver</a>";
        }else {
            echo "<br/><a href=paginaProfesor.php> Volver</a>";
        }
    }
?>