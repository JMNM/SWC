<?php 
    session_start();
    require_once('configuracionDB.php');
    $sql = "INSERT INTO ".TABLA_USUARIO." VALUES('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['nickname'].
			"', '".md5($_POST['contrasenia'])."', ".$_POST['tipo'].", '".$_POST['DNI']."', '".$_POST['email']."')";
    $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        echo "Fallo de conexión";
        //exit();
    }
    //$conexion->query("SET NAMES 'utf8'");
    if ($conexion->query($sql)){
        echo "Usuario insertado correctamente";
        if($_SESSION['tipo']==0){
            echo "<br/><a href=paginaAdmin.php> Volver</a>";
        }else {
            echo "<br/><a href=paginaProfesor.php> Volver</a>";
        }
    }else{
        echo "El usuario ya existe";
        if($_SESSION['tipo']==0){
            echo "<br/><a href=paginaAdmin.php> Volver</a>";
        }else {
            echo "<br/><a href=paginaProfesor.php> Volver</a>";
        }
    }
    $conexion->close();
?>