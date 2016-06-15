<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
    <head>
        <script type="text/javascript" src="js/funciones.js"></script>
            <title>Asignaturas | Departamento de Ciencias de la Computación e Inteligencia Artificial | Universidad de Granada</title>
            <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
            <meta name="description" content="Universidad de Granada - Departamento de Ciencias de la Computación e Inteligencia Artificial CCIA-UGR" />
            <meta name="keywords" content="universidad,granada, Departamento Ciencias de la Computación e Inteligencia Artifical (Docencia Tutorías Asignaturas Profesores)" />
            <meta http-equiv="content-language" name="language" content="es" />
            <meta http-equiv="X-Frame-Options" content="deny" />
            <meta name="verify-v1" content="wzNyCz8sYCNt7F8Bg9GWfznkU43lC9PNaZZAxRzkjJA=" />
            <meta name="author" content="Pablo Orantes Pozo / Plantilla Neutra Oficina Web UGR http://ofiweb.ugr.es" />
            <link rel="shortcut icon" href="decsai.ico" type="image/vnd.microsoft.icon" />
            <link rel="icon" href="decsai.ico" type="image/vnd.microsoft.icon" />
            <link rel="stylesheet" id="css-style" type="text/css" href="css/estilos.css" media="all" />

                                <style type="text/css">
                  div#general{width:100%;}
                  div#pagina{width:691px; background-image: url("img/interior/contenido-fondo.png"); background-size: 692px 70px;}
                  div#interior_pie{background-image:none;}
                </style>
                <script type="text/javascript" src="js/prototype.js"></script>
            <script type="text/javascript">
                function actualizar(){
                    var target = $('contenidoActualizar');
                    if(!target) return false;
                    new Ajax.PeriodicalUpdater(target, 'php/actualizaModuloVisualizacion.php', { frequency:30 , decay:1});
                }
                Event.observe(window,'load',actualizar,false);
            </script>
    </head>
    <body>
        <div id="contenedor_margenes" class="">
            <div id="contenedor" class="">
                <div id="cabecera" class="">
                    <h1 id="cab_inf">Ciencias de la Computación e Inteligencia Artificial</h1>
                    <div id="formularios">	
                        <span class="separador_enlaces"> | </span>
                        <div class="depto titulo"><span class="titulo_stack">Departamento</span><a href="index.php" id="enlace_stack">Departamento de Ciencias de la Computación e I.A.</a></div>
                        <span class="separador_enlaces"> | </span>
                    </div>
                </div>
            </div>
        </div>
                
                <div id="general">
                        <h1 class="tituloModVisu"><span class="texto_titulo">Lista de Turnos</span></h1>
                        
                            <table class="tablaModVisu">
                                <thead>
                                    <tr>
                                        <th>
                                            Codigo del Alumno
                                        </th>
                                        <th>
                                            Recurso
                                        </th>
                                        <th>
                                            Codigo Recurso
                                        </th>
                                        <th>
                                            Lugar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoActualizar">
                                    <?php
                                        require_once('php/configuracionDB.php');
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
                                </tbody>
                            </table>
                            
                        
                </div>
            
        
    </body>
    </html>
