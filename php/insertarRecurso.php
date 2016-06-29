<?php 
    session_start();
    require_once('configuracionDB.php');
    if(isset($_POST['nombreRecurso']) && isset($_POST['codigo']) && isset($_POST['asignatura']) && isset($_POST['fecha'])
            && isset($_POST['duracion']) && isset($_POST['hora']) && isset($_POST['lugar']) && isset($_SESSION['nombreUsuario'])){
        $patron_fecha = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}/";
        $patron_hora = "/^[0-9]{2}:[0-9]{2}/";
        $fecha_correcta=preg_match_all($patron_fecha, $_POST['fecha'], $coincidencias, PREG_OFFSET_CAPTURE);
        $hora_correcta=preg_match_all($patron_hora, $_POST['hora'], $coincidencias, PREG_OFFSET_CAPTURE);
        if($fecha_correcta && $hora_correcta){
        
            $sql = "INSERT INTO ".TABLA_RECURSOS." VALUES('".$_POST['nombreRecurso']."','".$_POST['codigo']."','".$_POST['asignatura'].
                                "', '".$_POST['fecha']."', ".$_POST['duracion'].", '".$_POST['hora'].":00','".$_POST['lugar']."','".$_SESSION['nombreUsuario']."')";
            $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                echo "Fallo de conexión";
                //exit();
            }
            //se inserta el recurso
            if ($conexion->query($sql)){
                echo "Recurso insertado correctamente";
                //se crea la tabla del recurso donde se apuntarán los asistentes
                $sql_crear_tabla = "CREATE TABLE lista".$_POST['codigo'].
                        " (codigoUsuario VARCHAR(20) PRIMARY KEY,".
                        "DNI VARCHAR(9) NOT NULL,".
                        "turno INT(6) NOT NULL) ";
                if ($conexion->query($sql_crear_tabla)){
                    if($_SESSION['tipo']==0){
                        echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
                    }else {
                        echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
                    }
                }else{
                    //si ha habido algún error al crear la tabla se elimina el recurso
                    $sql_rm = "DELETE FROM ".TABLA_RECURSOS." WHERE codigo=".$_POST['codigo']."";
                    $conexion->query($sql_rm);
                    echo "Error al crear la tabla del recurso";
                   if($_SESSION['tipo']==0){
                        echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
                    }else {
                        echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
                    }
                }

            }else{
                echo "El recurso ya existe";
                if($_SESSION['tipo']==0){
                    echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
                }else {
                    echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
                }
            }
            $conexion->close();
        }else{
            echo "Hora o fecha incorrecta:"
            . "\n Formato fecha: AAAA-MM-DD"
            . "\n formato hora: HH:MM";
                if($_SESSION['tipo']==0){
                    echo "<br/><a href=\"../paginaAdmin.php\"> Volver</a>";
                }else {
                    echo "<br/><a href=\"../paginaProfesor.php\"> Volver</a>";
                }
        }
    }
?>