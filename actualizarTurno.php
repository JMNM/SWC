<?php
    require_once('configuracionDB.php');
    if(isset($_GET['cod']) && isset($_GET['recurso'])){
        echo "hola ".$_GET['cod']." ".$_GET['recurso'];
        
        $sql = "SELECT nombre,lugar FROM " . TABLA_RECURSOS . " WHERE codigo='". $_GET['recurso']."'" ;
        $sql_turno="SELECT codigo_alumno FROM " . TABLA_TURNO . " WHERE codigo_recurso='". $_GET['recurso']."'" ;
        
        
        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
        $conexion2=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
        $conexion3=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
        /* comprobar la conexión */
        if (mysqli_connect_errno()) {
            echo "Fallo de conexión";
            //exit();
        }

        /* ligar variables de resultado */
        if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
            if($fila = $resultado->fetch_row()) {
                echo "<p>".$fila[0].", ".$fila[1]." </p>";
                if ($resultado2 = $conexion2->query($sql_turno,MYSQLI_USE_RESULT)){
                    
                    if($fila2 = $resultado2->fetch_row()) {
                        $sql_update="UPDATE ".TABLA_TURNO." SET codigo_alumno='".$_GET['cod'] . "', "
                            . " lugar='".$fila[1]."', nombre_recurso='".$fila[0]."'"
                            . " WHERE codigo_recurso='".$_GET['recurso']."'";
                        if ( $conexion3->query($sql_update)){
                            echo "El turno se ha modificado";
                        }
                        echo "4";
                    }else{
                        $sql_insertar= "INSERT INTO ".TABLA_TURNO." VALUES('".$_GET['cod']."','".$fila[1]."','".$_GET['recurso'].
                            "', '".$fila[0]."')";
                        if ($conexion3->query($sql_insertar)){
                            echo "Turno insertado correctamente";
                        }
                        echo "5";
                    }
                    echo "6";
                    $resultado2->close();
                }else{
                    $sql_insertar= "INSERT INTO ".TABLA_TURNO." VALUES('".$_GET['cod']."','".$fila[1]."','".$_GET['recurso']."', '".$fila[0]."')";
                    if ($conexion2->query($sql_insertar)){
                        echo "Turno insertado correctamente";

                    }
                    echo "8";
                }
                
                echo "1";
                
            }
            echo "2";
            /* liberar el conjunto de resultados */
            $resultado->close();
        }else{
            echo "<p>No se ha podido obtener el recurso</p>";
        }
        echo "7";
        //$identUsuario->bind_result($pass,$tipo);

        /* obtener valor */
        //$identUsuario->fetch();
        $conexion->close();
        $conexion2->close();
        $conexion3->close();
    }     
    
    echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
?>