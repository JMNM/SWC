<?php 
    session_start();
    require_once('configuracionDB.php');
    echo "<p>".$_POST['fecha']."</p>";
    $sql = "INSERT INTO ".TABLA_RECURSOS." VALUES('".$_POST['nombreRecurso']."','".$_POST['codigo']."','".$_POST['asignatura'].
			"', '".$_POST['fecha']."', ".$_POST['duracion'].", '".$_POST['hora'].":00','".$_SESSION['nombreUsuario']."')";
    $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        echo "Fallo de conexión";
        //exit();
    }
    //$conexion->query("SET NAMES 'utf8'");
    if ($conexion->query($sql)){
        echo "Recurso insertado correctamente";
        $sql_crear_tabla = "CREATE TABLE lista".$_POST['codigo'].
                " (codigoUsuario VARCHAR(20) PRIMARY KEY,".
                "DNI VARCHAR(9) NOT NULL,".
                "turno INT(6) NOT NULL) ";
        if ($conexion->query($sql_crear_tabla)){
            echo "<br/><a href=paginaAdmin.php> Volver</a>";
        }else{
            $sql_rm = "DELETE FROM ".TABLA_RECURSOS." WHERE codigo=".$_POST['codigo']."";
            $conexion->query($sql_rm);
            echo "Error al crear la tabla del recurso";
            echo "<br/><a href=paginaAdmin.php> Volver</a>";
        }
        
    }else{
        echo "El recurso ya existe";
        echo "<br/><a href=paginaAdmin.php> Volver</a>";
    }
    $conexion->close();
?>