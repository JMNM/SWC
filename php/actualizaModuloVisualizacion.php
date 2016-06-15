<?php
    require_once('configuracionDB.php');
    $sql = "SELECT codigo_alumno,nombre_recurso,codigo_recurso,lugar FROM " . TABLA_TURNO;

    $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        echo "Fallo de conexión";
        //exit();
    }

    /* ligar variables de resultado */
    if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
        
        while ($fila = $resultado->fetch_row()) {
            //Se imprime el resulrado de la consulta para actualizar la tabla del modulo de visualización
            echo "<tr><td>".$fila[0]."</td>"
                    . "<td>".$fila[1]."</td>"
                    . "<td>".$fila[2]."</td>"
                    . "<td>".$fila[3]."</td>"
                    . "</td></tr>";
                    
        }

        /* liberar el conjunto de resultados */
        $resultado->close();
    }
    /*Se cierra la conexión*/
    $conexion->close();


?>