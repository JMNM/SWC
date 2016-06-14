<?php
        require_once('configuracionDB.php');
                
                $consultaNumReg="SELECT COUNT(*) FROM ".TABLA_RECURSOS;
                $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
                /* comprobar la conexión */
                if (mysqli_connect_errno()) {
                    //echo "Fallo de conexión";
                    //exit();
                }
                $numC=$conexion->query($consultaNumReg);
                $colum = $numC->fetch_row();
                $numC->close();
                $conexion->close();
                
                
                
                for($j=0;$j<$colum[0];$j++){
                    if(isset($_POST[$j])){
                        if(!empty($_POST[$j])){
                            $cod_consulta=$_POST["codigo".$j];
                            setcookie('codigo', $cod_consulta, time() +  24 * 60 * 60);
                        }
                    }
                }
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
        
        <br/>
        <br/>
        
        <br/>
        <br/>
            <a href="altaRecurso.php">Inscribirse al Recurso</a><br/><br/>
            <a href="bajaRecurso.php">Borrarse del Recurso</a><br/><br/>
            <a href="consultaTurno.php">Consultar Turno</a><br/><br/>
            <a href="index.php">Vorver</a><br/><br/>
          </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo"></span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
            
            <?php
                
                
                $sql = "SELECT nombre,codigo,asignatura,fecha,duracion,hora_inicio,lugar,profesor FROM " . TABLA_RECURSOS . " WHERE codigo = ?";
                
                if(isset($cod_consulta)){
                    if(!empty($cod_consulta)){
                        $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
                        
                        /* comprobar la conexión */
                        if (mysqli_connect_errno()) {
                            echo "Fallo de conexión";
                            //exit();
                        }
                        if($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)){
                            
                        }
                        
                        $obtenerR= $conexion->prepare($sql);
                        $obtenerR->bind_param('s', $cod_consulta);
                        $obtenerR->execute();
                        /* ligar variables de resultado */

                        $obtenerR->bind_result($nombreR,$codigoR, $asignaturaR,$fechaR,$duracionR,$horainicioR, $lugarR,$profesorR);
                         
                        /* obtener valor */
                        if($obtenerR->fetch()){
                            
                        }
                        $obtenerR->close();
                        $conexion->close();

                    }else{
                        $nombreR="no encontrado";
                        $codigoR="no encontrado";
                        $asignaturaR="no encontrado";
                        $fechaR="no encontrado";
                        $duracionR="no encontrado";
                        $horainicioR="no encontrado";
                        $profesorR="no encontrado";
                    $lugarR="no encontrado";
                    }
                }else{
                    $nombreR="no encontrado";
                    $codigoR="no encontrado";
                    $asignaturaR="no encontrado";
                    $fechaR="no encontrado";
                    $duracionR="no encontrado";
                    $horainicioR="no encontrado";
                    $profesorR="no encontrado";
                    $lugarR="no encontrado";
                }
            ?>
                
            <table>
                <thead>
                    <tr>
                        <th>
                            Informacion Del Recurso
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Nombre del Recurso:</td>
                        <?php echo "<td>".$nombreR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Profesor:</td>
                        <?php echo "<td>".$profesorR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Asignatura:</td>
                        <?php echo "<td>".$asignaturaR."</td>"; ?>
                    </tr>
                    <tr>
                        <td>Cod. Recurso:</td>
                        <?php echo "<td>".$codigoR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Fecha:</td>
                        <?php echo "<td>".$fechaR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Hora de inicio:</td>
                        <?php echo "<td>".$horainicioR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Duración:</td>
                        <?php echo "<td>".$duracionR."</td>"; ?> 
                    </tr>
                    <tr>
                        <td>Lugar:</td>
                        <?php echo "<td>".$lugarR."</td>"; ?> 
                    </tr>
                    
                </tbody>
            </table>
            
        
            <p id="barra"></p><br/> 
            
            
    
    	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">_uacct = "UA-2290740-1";urchinTracker();</script>

				    
			    </div>
		    </div>
      
	    </body>
    </html>
    