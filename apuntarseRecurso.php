<?php
if(isset($_POST['codigoRecurso']) && isset($_POST['DNIAlumno'])){
    require_once('configuracionDB.php');
    $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);
    $sql_consulta= "SELECT COUNT(*) FROM lista".$_POST['codigoRecurso'];
    
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        echo "Fallo de conexión";
        //exit();
    }
    
    $numF=$conexion->query($sql_consulta);
    $colum = $numF->fetch_row();
    $numF->close();
    
    $codigoUsu=  substr($_POST['DNIAlumno'],0,-7).substr($_POST['DNIAlumno'],6,-1)."*".$_POST['codigoRecurso'];
    
    $sql = "INSERT INTO lista".$_POST['codigoRecurso']." VALUES('".$codigoUsu."','".$_POST['DNIAlumno']."',".($colum[0]+1).")";
    
    //$conexion->query("SET NAMES 'utf8'");
    if ($conexion->query($sql)){
        echo "Usuario inscrito correctamente, Su codigo es:".$codigoUsu;
        echo "<br/><a href=index.php> Volver</a>";
    }else{
        echo "El usuario ya existe";
        echo "<br/><a href=index.php> Volver</a>";
    }
    $conexion->close();
}else{
        echo "No se a podido inscribir al recurso, datos incorrectos";
        echo "<br/><a href=index.php> Volver</a>";
    }
?>