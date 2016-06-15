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
            <br/>
        <br/>
        <br/>
        <br/>
        <a href=paginaAdmin.php>Volver</a><br/><br/>
        <?php
            echo "<p>Se ha identificado como ".$_SESSION['usuario']."</p>";
            echo "<a href=\"php/cerrarSesion.php\">Cerrar Sesión</a>";
        ?>
        </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Modificar Profesor</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
            
            <?php
                require_once('php/configuracionDB.php');
                $sql = "SELECT nickname FROM " . TABLA_USUARIO . " WHERE tipo=". 1 ;

                $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

                /* comprobar la conexión */
                if (mysqli_connect_errno()) {
                    echo "Fallo de conexión";
                    //exit();
                }

                /* ligar variables de resultado */
                if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
                    //$i=0;
                    echo "<form name=\"formSelecProfe\" action=\"modificarProfesor.php\" method=\"get\">";
                    echo "<label class=\"labelIden\" for=\"nickname\">Profesor a modificar: </label> "
                                ." <select id=\"nickname\" class=\"imputIden\" name=\"nickname\">";
                    while ($fila = $resultado->fetch_row()) {
                        //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
                        if(isset($_GET['nickname'])){
                            if($_GET['nickname']==$fila[0]){
                                echo " <option value=\"".$fila[0]."\" selected >".$fila[0]."</option>";
                            }else{
                                echo " <option value=\"".$fila[0]."\">".$fila[0]."</option>";
                            }
                        }else{
                            echo " <option value=\"".$fila[0]."\">".$fila[0]."</option>";
                        }
                            
                        
                        //$i++;
                    }
                    echo "</select>"
                            . "<input onclick=\"habilitarModi()\" class=\"labelIden\" type=\"submit\" value=\"Seleccionar\"/><br/>"
                            . "</form>";
                    
                    /* liberar el conjunto de resultados */
                    $resultado->close();
                }else{
                    echo "<p>No hay profesores para modifocar</p>";
                }
                //$identUsuario->bind_result($pass,$tipo);

                /* obtener valor */
                //$identUsuario->fetch();
                $conexion->close();
                          
            ?>
            <form name="formUsuario" disabled="true" id="formModificarProfe" action="php/actualizarProfe.php" method="post" onsubmit="validarFormulario()">
            <?php
            if(isset($_GET['nickname'])){
                require_once('php/configuracionDB.php');
                $sql = "SELECT nombre,apellidos,email FROM " . TABLA_USUARIO . " WHERE nickname='". $_GET['nickname']."'" ;

                $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

                /* comprobar la conexión */
                if (mysqli_connect_errno()) {
                    echo "Fallo de conexión";
                    //exit();
                }

                /* ligar variables de resultado */
                if ($resultado = $conexion->query($sql,MYSQLI_USE_RESULT)) {
                    
                    if($fila = $resultado->fetch_row()) {
                        //printf ("(%s) (%s) (%s)\n", $fila[0], $fila[1], $fila[2]);
                        echo "<input type=\"hidden\" name=\"nickname\" value=\"".$_GET['nickname']."\">";
                        echo "<label class=\"labelIden\" for=\"name\">Nombre:</label>"
                                ."<input class=\"imputIden\" type=\"text\" name=\"nombre\" id=\"nombre\" value=\"".$fila[0]."\" onfocusout=\"Nombre()\" /> <br/>";
                        echo "<label class=\"labelIden\" for=\"apellidos\">Apellidos:</label>"
                                ."<input class=\"imputIden\" type=\"text\" name=\"apellidos\" id=\"apellidos\" value=\"".$fila[1]."\" onfocusout=\"Apellidos()\"/><br/>";
                        echo "<label class=\"labelIden\" for=\"email\">Email:</label>"
                            ."<input class=\"imputIden\" type=\"text\" name=\"email\" id=\"email\" value=\"".$fila[2]."\" onfocusout=\"Email()\"/><br/><br/>";
            
                        
                        
                    }
                    echo "<input class=\"labelIden\" type=\"submit\" value=\"Modificar\"/><br/>";
                    
                    /* liberar el conjunto de resultados */
                    $resultado->close();
                }else{
                    echo "<p>No tiene recursos para modifocar</p>";
                }
                //$identUsuario->bind_result($pass,$tipo);

                /* obtener valor */
                //$identUsuario->fetch();
                $conexion->close();
            }            
            ?>
            
        </form>
            		    
			    </div>
		    </div>
      
	    </body>
    </html>
    