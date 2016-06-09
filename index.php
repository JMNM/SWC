  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
	<head>
            <script type="text/javascript" src="funciones.js"></script>
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
	    <div id="login_form_widget" class="mod-buttons fieldset login_form login_form_widget">
	      <label id="login_widget" for="ilogin_widget" class="login login_widget">
		<span>Usuario</span>
		<input name="user" id="ilogin_widget" value="usuario..." onfocus="javascript:if(this.value='usuario...') this.value='';return true;" type="text" />
	      </label>
	      <label id="password_widget" for="ipassword_widget" class="password password_widget">
		<span>Contraseña</span>
		<input name="passwd" id="ipassword_widget" type="password" />
	      </label>
	      <label id="enviar_login_widget" for="submit_login_widget" class="enviar_login enviar_login_widget">
		<input src="img/transp.gif" alt="enviar datos de identificación" name="submit" id="submit_login_widget" class="image-enviar" type="image" />
	      </label>
	      <div style="float:right; margin-top:5px;"><a id="forgot" href="https://decsai.ugr.es/index.php?p=forgotpasswd&amp;action=forgot">¿Olvidó su contraseña?</a></div>
	      <span id="login_error_widget"> </span>
	    </div>
	</form>

          </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Recursos Activos</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
          
            
         <table>
                <thead>
                    <tr>
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
                             
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('configuracionDB.php');
                        $sql = "SELECT codigo,asignatura,fecha FROM " . TABLA_RECURSOS;

                        
                          
                        $conexion=new mysqli('localhost','root',DB_CONTRASENIA,'70156169x-2');

                        /* comprobar la conexión */
                        if (mysqli_connect_errno()) {
                            echo "Fallo de conexión";
                            //exit();
                        }
                        
                        /* ligar variables de resultado */
                        if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {

                            
                            while ($fila = $resultado->fetch_row()) {
                                //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
                                echo "<tr><td>".$fila[0]."</td>"
                                        . "<td>".$fila[1]."</td>"
                                        . "<td>".$fila[2]."</td>"
                                        . "<td>"
                                        . " <form action=\"infoRecurso.php\" method=\"get\">"
                                        . "<input type=\"hidden\" value = \"".$fila[0]."\" ></input>"
                                        . "<input name=\"submit\" type=\"submit\" value=\"Consultar\"></input>"
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

            
    
    	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">_uacct = "UA-2290740-1";urchinTracker();</script>

				    
			    </div>
		    </div>
      
	    </body>
    </html>
    