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
        $i=0;
        while ($fila = $resultado->fetch_row()) {
            //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
            echo "<tr><td>".$fila[0]."</td>"
                    . "<td>".$fila[1]."</td>"
                    . "<td>".$fila[2]."</td>"
                    . "<td>".$fila[3]."</td>"
                    . "</td></tr>";
                    $i++;
        }

        /* liberar el conjunto de resultados */
        $resultado->close();
    }
    //$identUsuario->bind_result($pass,$tipo);

    /* obtener valor */
    //$identUsuario->fetch();
    $conexion->close();


?>