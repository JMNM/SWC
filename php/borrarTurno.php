<?php
    session_start();
    if(isset($_GET['recurso'])){
        if(!empty($_GET['recurso'])){
            require_once('configuracionDB.php');
            $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

            $sql = "SELECT codigo_recurso FROM " . TABLA_TURNO . " WHERE codigo_recurso = '".$_GET['recurso']."'";

            //se realiza la consulta
            if ($resul = $conexion->query($sql)){
                if($fila = $resul->fetch_row()){
                    //echo "<p>".$fila[0]."</p>";
                    //si se encuentra el turno se borra
                    $sql_delete="DELETE FROM " . TABLA_TURNO . " WHERE codigo_recurso = '".$_GET['recurso']."'";
                    $conexion->query($sql_delete);
                }

            }
            $conexion->close();
        }
    }
    if($_SESSION['tipo']==0){
        echo "<script language=\"javascript\">window.location=\"../paginaAdmin.php\"</script>;";
    }else{
        echo "<script language=\"javascript\">window.location=\"../paginaProfesor.php\"</script>;";
    }
    exit;
?>