<?php
session_start();
    require_once('configuracionDB.php');
    $sql = "SELECT password,tipo,nombre FROM " . TABLA_USUARIO . " WHERE nickname = ?";

    if(isset($_POST["user"])){
        if(!empty($_POST["user"])){
            $conexion=new mysqli(DB_DSN,DB_USUARIO,DB_CONTRASENIA,DB_NAME);

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                echo "Fallo de conexión";
                //exit();
            }
            $identUsuario= $conexion->prepare($sql);
            $identUsuario->bind_param('s', $_POST['user']);
            $identUsuario->execute();
            
            /* ligar variables de resultado */
            $identUsuario->bind_result($pass,$tipo,$nombre);

            /* obtener valor */
            $identUsuario->fetch();
            $conexion->close();
            //se comprueba que el password es correcto
            if(isset($_POST["passwd"])){
                if(!empty($_POST["passwd"])){
                    if($pass==md5($_POST["passwd"])){
                        
			$_SESSION["usuario"]=$_POST['user'];
                        $_SESSION["tipo"]=$tipo;
                        $_SESSION["nombreUsuario"]=$nombre;
                        if($tipo==0){
                            echo "<script language=\"javascript\">window.location=\"../paginaAdmin.php\"</script>;";
                        }else{
                            echo "<script language=\"javascript\">window.location=\"../paginaProfesor.php\"</script>;";
                        }
                        exit;
                    }else{
                        //echo $pass;
                        //echo md5($_POST["passwd"]);
                        session_destroy();
                        echo "Usuario o contraseña incorrecta";
                        echo "<br/><a href=\"../index.php\"> Volver</a>";
                    }
                }else{
                    session_destroy();
                    echo "Usuario o contraseña incorrecta";
                    echo "<br/><a href=\"../index.php\"> Volver</a>";
                }
            }else{
                session_destroy();
                echo "Usuario o contraseña incorrecta";
                echo "<br/><a href=\"../index.php\"> Volver</a>";
            }

        }else{
            session_destroy();
            echo "Usuario o contraseña incorrecta";
            echo "<br/><a href=\"../index.php\"> Volver</a>";
        }
    }else{
        session_destroy();
        echo "Usuario o contraseña incorrecta";
        echo "<br/><a href=\"../index.php\"> Volver</a>";
    }
?>