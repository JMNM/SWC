<?php 
    session_start();
?> 
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
        <br/><br/><br/><br/>
        <a href=<?php
            if($_SESSION['tipo']==0){
                echo "paginaAdmin.php";
            }else {
                echo "paginaProfesor.php";
            }
            ?>>Volver
        </a><br/><br/>
        <?php
            echo "<p>Se ha identificado como ".$_SESSION['usuario']."</p>";
            echo "<a href=cerrarSesion.php>Cerrar Sesión</a>";
        ?>
      
          </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Formulario de Inscripción De Recursos</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
          
            
            <form name="formUsuario" action="insertarRecurso.php" method="post" onsubmit="validarFormulario()">
            <label class="labelIden" for="nombreRecurso">Nombre Recurso:</label>
            <input class="imputIden" type="text" name="nombreRecurso" id="nombre" value="" onfocusout="Nombre()"/> <br/>           
            <label class="labelIden" for="fecha">Fecha:</label>
            <input class="imputIden" type="date" name="fecha" min="2016-01-01" id="fecha" value="" /><br/>
            <label class="labelIden" for="hora">Hora inicio:</label>
            <input class="imputIden" type="time" name="hora" id="hora" value="" /><br/>
            
            <label class="labelIden" for="duracion">Duración:</label>
            <input class="imputIden" type="number" id="duracion" name="duracion" value="" onfocusout="Duracion()"/><br/>
           
             <label class="labelIden" for="lugar">Lugar:</label>
             <input class="imputIden" type="text" name="lugar" id="lugar" value="" onfocusout="Lugar()"/><br/>
             <label class="labelIden" for="codigo">Codigo Recurso:</label>
             <input class="imputIden" type="text" name="codigo" id="codigo" value="" onfocusout="Codigo()"/><br/>
            
            <label class="labelIden" for="asignatura">Asignatura:</label>
            <input class="imputIden" type="asignatura" name="asignatura" id="asignatura" value="" onfocusout="Asignatura()"/><br/>
                      
               <br/>
                <input class="labelIden" type="submit" value="Enviar"/><br/>
        </form>
            
    
    	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">_uacct = "UA-2290740-1";urchinTracker();</script>

				    
			    </div>
		    </div>
			
        </div>	
			
      
    </body>
</html>
    