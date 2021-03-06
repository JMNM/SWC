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
        <br/><br/><br/><br/>
        <a href=paginaAdmin.php>Volver</a><br/><br/>
        <?php
            echo "<p>Se ha identificado como ".$_SESSION['usuario']."</p>";
            echo "<a href=\"php/cerrarSesion.php\">Cerrar Sesión</a>";
        ?>
        </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Formulario de Inscripción Profesor</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
          
            
            <form name="formUsuario" action="php/insertarProf.php" method="post" >
                
            <label class="labelIden" for="nombre">Nombre:</label>
            <input class="imputIden" type="text" name="nombre" id="nombre" value=""  onfocusout="Nombre()"/> <br/>
            
            <label class="labelIden" for="apellidos">Apellidos:</label>
            <input class="imputIden" type="text" name="apellidos" id="apellidos" value=""  onfocusout="Apellidos()"/><br/>
            
            <label class="labelIden" for="DNI">DNI:</label>
            <input class="imputIden" type="text" name="DNI" id="dni" value=""  onfocusout="validarDni()"/><br/>
           
            <label class="labelIden" for="nickname">Nick-name:</label>
            <input class="imputIden" type="text" name="nickname" id="nickname" value=""  onfocusout="nickName()"/><br/>
            
            <label class="labelIden" for="contrasenia">Contraseña:</label>
            <input class="imputIden" type="password" name="contrasenia" id="contrasenia" value=""  onfocusout="Contrasenia()"/><br/>
            
            <label class="labelIden" for="confirmacontrasenia">Confirmar Contraseña:</label>
            <input class="imputIden" type="password" name="confirmacontrasenia" id="confirmacontrasenia" value=""  onfocusout="ConfirmaContrasenia()"/><br/>
            
            <label class="labelIden" for="email">Email:</label>
            <input class="imputIden" type="text" name="email" id="email" value="" onfocusout="Email()" /><br/>
            
            <label class="labelIden" for="tipo">Tipo de usuario: </label>
            <select id="tipo" class="imputIden" name="tipo">
                    <option value="1">Profesor</option>
                    <option value="0">Administrador</option>
            </select>
            <br/>
            <input class="labelIden" type="submit" value="Enviar"/><br/>
        </form>
            
    
    
				    
			    </div>
		    </div>
      
	    </body>
    </html>
    