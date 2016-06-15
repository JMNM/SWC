<?php 
    session_start();
?>  
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
    	<div id="rastro-idiomas">
		<div class="language">
                		</div>
		<div id="rastro">
			<ul id="rastro_breadcrumb">
		</div>

	</div>
          <div id="general">
        <div id="menus">
            <div id="enlaces_secciones" class="mod-menu_secciones">
                <a href="http://www.ugr.es" id="enlace_ugr"><img src="img/logo-ugr.png"></img></a>
            </div>

      <form class="widget_loginform" action="https://decsai.ugr.es/" method="post">
	    <br/>
        <br/>
        <br/>
        <br/>
        <a href="altaProfesor.php">Dar de Alta Profesor</a><br/>
        <br/>
        <a href="bajaProfesor.php">Dar de Baja Profesor</a><br/>
        <br/>
        <a href="modificarProfesor.php">Modificar Profesor</a><br/>
        <br/>
        <a href="inscripcionRecurso.php">Dar de Alta Recurso</a><br/>
        <br/>
        <a href="borraRecurso.php">Dar de Baja Recurso</a><br/>
        <br/>
        <a href="modificarRecurso.php">Modificar Recurso</a><br/>
        <br/>
        <a href="iniciarRecurso.php">Iniciar Recurso</a><br/>
        <br/>
        <?php
            echo "<p>Se ha identificado como ".$_SESSION['usuario']."</p>";
            echo "<a href=\"php/cerrarSesion.php\">Cerrar Sesión</a>";
        ?>
	</form>

          </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Listado de Profesores</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
          
            
            <table>
                <thead>
                    <tr>
                        <th>
                            Nickname
                        </th>
                        <th>
                            Apellidos
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            DNI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('php/configuracionDB.php');
                        $sql = "SELECT nickname,apellidos,nombre,DNI FROM " . TABLA_USUARIO . " WHERE tipo = 1";

                        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

                        /* comprobar la conexión */
                        if (mysqli_connect_errno()) {
                            echo "Fallo de conexión";
                            //exit();
                        }
                        
                        /* se crea la lista de profesores */
                        if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
                            while ($fila = $resultado->fetch_row()) {
                                //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
                                echo "<tr><td>".$fila[0]."</td>"
                                        . "<td>".$fila[1]."</td>"
                                        . "<td>".$fila[2]."</td>"
                                        . "<td>".$fila[3]."</td>"
                                        . "</td></tr>";
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
            
            
            <h1 id="titulo_pagina"><span class="texto_titulo">Listado de Recursos</span></h1>
            
            <table>
                <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Codigo 
                        </th>
                        <th>
                            Asignatura
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Duracion(h) 
                        </th>
                        <th>
                            Hora inicio
                        </th>
                        <th>
                            Lugar
                        </th>
                         <th>
                            Profesor 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('php/configuracionDB.php');
                        $sql = "SELECT nombre,codigo,asignatura,fecha,duracion,hora_inicio,lugar,profesor FROM " . TABLA_RECURSOS;

                        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

                        /* comprobar la conexión */
                        if (mysqli_connect_errno()) {
                            echo "Fallo de conexión";
                            //exit();
                        }
                        
                        /*se crea la lista de recursos */
                        if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
                            $i=0;
                            while ($fila = $resultado->fetch_row()) {
                                //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
                                echo "<tr><td>".$fila[0]."</td>"
                                        . "<td>".$fila[1]."</td>"
                                        . "<td>".$fila[2]."</td>"
                                        . "<td>".$fila[3]."</td>"
                                        . "<td>".$fila[4]."</td>"
                                        . "<td>".$fila[5]."</td>"
                                        . "<td>".$fila[6]."</td>"
                                        . "<td>".$fila[7]."</td>"
                                        . "</td></tr>";
                                        $i++;
                            }
                            
                            /* liberar el conjunto de resultados */
                            $resultado->close();
                        }
                        $conexion->close();
                                
                    
                    ?>
                </tbody>
            </table>
    
				    
            </div>
	</div>
      
    </body>
</html>
    