<?php 
    session_start();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
	<head>
            <script type="text/javascript" src="funciones.js"></script>
            <script type="text/javascript" src="gestionRecurso.js"></script>
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
                    
                
            <script type="text/javascript">
                var listaAsistentes=new Array();
                var listaEspera=new Array();
                var actual=new Array();
                var recurso;
            
            </script>
            <?php
                require_once('configuracionDB.php');
                $sql = "SELECT codigoUsuario,DNI,turno FROM lista".$_GET['codrecurso'];
                echo "<script type=\"text/javascript\"> "
                                . "recurso=\"".$_GET['codrecurso']."\";"
                                ."</script>";
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
                        echo "<script type=\"text/javascript\"> "
                                . "var fil=[\"".$fila[1]."\",\"".$fila[0]."\",\"".$fila[2]."\"];"
                                ." listaAsistentes[".$i."]=fil;"
                                ."</script>";
                                $i++;
                    }

                    /* liberar el conjunto de resultados */
                    $resultado->close();
                }
                $conexion->close();
            ?>
            <script type="text/javascript">
                listaAsistentes.sort(compararTurno);
                function generaLista(){
                    var tbody=document.getElementById("listaNormal");
                    for(var i=0;i<listaAsistentes.length;i++){
                        var fila= document.createElement("tr");
                        for(var j=0;j<listaAsistentes[i].length;j++){
                            var ele= document.createElement("td");
                            var texto= document.createTextNode(listaAsistentes[i][j]);
                            
                            ele.appendChild(texto);
                            
                            
                            fila.appendChild(ele);
                        }
                        tbody.appendChild(fila);
                    }
                }
                function generaListaEspera(){
                    var tbody=document.getElementById("tablaListaEspera");
                    for(var i=0;i<listaEspera.length;i++){
                        var fila= document.createElement("tr");
                        for(var j=0;j<listaEspera[i].length;j++){
                            var ele= document.createElement("td");
                            var texto= document.createTextNode(listaEspera[i][j]);
                            
                            ele.appendChild(texto);
                            
                            
                            fila.appendChild(ele);
                        }
                        tbody.appendChild(fila);
                    }
                }
                function Siguiente(){
                    var turno=0;
                    var espera=false;
                    var Actualdni= document.getElementById("dniActual");
                    var Actualcod= document.getElementById("codActual");
                    for(var i=0;i<listaEspera.length;i++){
                        if(actual!=null)
                            if(listaEspera[i][1]==actual[1]){
                                turno=i;
                                espera=true;
                            }
                    }
                    if(espera && ((listaEspera.length-1)!=turno)){
                        Actualdni.innerHTML="DNI: "+listaEspera[turno+1][0];
                        Actualcod.innerHTML="Cod. Alumno: "+listaEspera[turno+1][1];
                        actual=listaEspera[turno+1];
                    }else if(espera){
                        Actualdni.innerHTML="DNI: "+listaAsistentes[0][0];
                        Actualcod.innerHTML="Cod. Alumno: "+listaAsistentes[0][1];
                        actual=listaAsistentes[0];
                        listaAsistentes.shift();
                    }else if(listaEspera.length>0){
                        Actualdni.innerHTML="DNI: "+listaEspera[0][0];
                        Actualcod.innerHTML="Cod. Alumno: "+listaEspera[0][1];
                        actual=listaEspera[0];
                    }else if(listaAsistentes.length>0){
                        Actualdni.innerHTML="DNI: "+listaAsistentes[0][0];
                        Actualcod.innerHTML="Cod. Alumno: "+listaAsistentes[0][1];
                        actual=listaAsistentes[0];
                        listaAsistentes.shift();
                    }
                    if(listaAsistentes.length<=0 && listaEspera.length<=0){
                        document.getElementById("botonSig").disabled=true;
                        document.getElementById("botonEspera").disabled=true;
                        document.getElementById("botonAtendido").disabled=true;
                    }
                    ActualizarListaAsistentes();
                }
                function Espera(){
                    var turno=-2;
                    var espera=false;
                    var Actualdni= document.getElementById("dniActual");
                    var Actualcod= document.getElementById("codActual");
                    for(var i=0;i<listaEspera.length;i++){
                        if(listaEspera[i][1]==actual[1]){
                            turno=i;
                            espera=true;
                        }
                    }
                    if(espera && ((listaEspera.length-1)!=turno)){
                        Actualdni.innerHTML="DNI: ";
                        Actualcod.innerHTML="Cod. Alumno: ";
                        for(var i=turno;i<listaEspera.length-1;i++){
                            listaEspera[i]=listaEspera[i+1];
                        }
                        listaEspera[listaEspera.length-1]=actual;
                        actual=null;
                    }else if((listaEspera.length-1)!=turno){
                        Actualdni.innerHTML="DNI: ";
                        Actualcod.innerHTML="Cod. Alumno: ";
                        listaEspera.push(actual);
                        actual=null;
                    }
                    Actualdni.innerHTML="DNI: ";
                    Actualcod.innerHTML="Cod. Alumno: ";
                    actual=null;
                    ActualizarListaEspera();
                }
                
                function Atendido(){
                    var turno=0;
                    var espera=false;
                    var Actualdni= document.getElementById("dniActual");
                    var Actualcod= document.getElementById("codActual");
                    for(var i=0;i<listaEspera.length;i++){
                        if(actual!=null)
                            if(listaEspera[i][1]==actual[1]){
                                turno=i;
                                espera=true;
                            }
                    }
                    if(espera){
                        Actualdni.innerHTML="DNI: ";
                        Actualcod.innerHTML="Cod. Alumno: ";
                        for(var i=turno;i<listaEspera.length-1;i++){
                            listaEspera[i]=listaEspera[i+1];
                        }
                        listaEspera.pop();
                        actual=null;
                    }else{
                        Actualdni.innerHTML="DNI: ";
                        Actualcod.innerHTML="Cod. Alumno: ";
                        actual=null;
                    }
                    if(listaAsistentes.length<=0 && listaEspera.length<=0){
                        document.getElementById("botonSig").disabled=true;
                        document.getElementById("botonEspera").disabled=true;
                        document.getElementById("botonAtendido").disabled=true;
                    }
                    ActualizarListaEspera();
                }
                
                function ActualizarListaAsistentes(){
                    var tbody=document.getElementById("listaNormal");
                    var num=tbody.childNodes.length;
                    var hijo=document.getElementById("listaNormal").childNodes[0];
                    while(num>0){
                        tbody.removeChild(hijo);
                        num--;
                        hijo=document.getElementById("listaNormal").childNodes[0];
                    }
                    generaLista()
                }
                function ActualizarListaEspera(){
                    var tbody=document.getElementById("tablaListaEspera");
                    var num=tbody.childNodes.length;
                    var hijo=document.getElementById("tablaListaEspera").childNodes[0];
                    while(num>0){
                        tbody.removeChild(hijo);
                        num--;
                        hijo=document.getElementById("tablaListaEspera").childNodes[0];
                    }
                    generaListaEspera()
                }
                function enviarGet()
                {
                    
                    //location.href="actualizarTurno.php?dni="+actual[0]+"&recurso="+recurso+"";
                }
            </script>
        </head>
	<body onload="generaLista()">
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
        <a href=<?php
            if($_SESSION['tipo']==0){
                echo "paginaAdmin.php";
            }else {
                echo "paginaProfesor.php";
            }
            ?>>Finalizar
        </a><br/>
        <br/>
        <?php
            echo "<p>Se ha identificado como ".$_SESSION['usuario']."</p>";
            echo "<a href=cerrarSesion.php>Cerrar Sesión</a>";
        ?>
	</form>

          </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Recurso Activo</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
           
            <h3><span class="texto_titulo">Turno actual:</span></h3>
            <table>
                <tbody>
                    <tr>
                        <th id="dniActual">
                            DNI:
                        </th>
                        <th id="codActual">
                            Cod. Alumno:
                        </th>
                    </tr>
                </tbody>
            </table>
            
            <h1 id="titulo_pagina"><span class="texto_titulo">Lista en espera</span></h1>
            
            <table>
                <thead>
                    <tr>
                        <th>
                            DNI 
                        </th>
                        <th>
                            Cod. Alumno
                        </th>
                    </tr>
                </thead>
                <tbody id="tablaListaEspera">
                    
                </tbody>
            </table>
            
            <h1 id="titulo_pagina"><span class="texto_titulo">Lista de asistentes</span></h1>
            
            <table>
                <thead>
                    <tr>
                        <th>
                            DNI 
                        </th>
                        <th>
                            Cod. Alumno
                        </th>
                    </tr>
                </thead>
                <tbody id="listaNormal" >
                    
                </tbody>
            </table>
            <iframe name="miiframe"></iframe>
            <a href="javascript:enviarGet()" onclick="Siguiente()" target="miiframe"><button id="botonSig">Siguiente</button></a>
            
            <button id="botonEspera" onclick="Espera()">Espera</button>
            <button id="botonAtendido" onclick="Atendido()">Atendido</button>
            
          
			    </div>
		    </div>
      
	    </body>
    </html>
