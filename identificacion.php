<?php
session_start();
    require_once('configuracionDB.php');
    $sql = "SELECT password,tipo FROM " . TABLA_USUARIO . " WHERE nickname = ?";

    if(isset($_POST["user"])){
        if(!empty($_POST["user"])){
            $conexion=new mysqli('localhost','root','4827','70156169x-2');

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                //echo "Fallo de conexión";
                //exit();
            }
            $identUsuario= $conexion->prepare($sql);
            $identUsuario->bind_param('s', $_POST['user']);
            $identUsuario->execute();
            /* ligar variables de resultado */

            $identUsuario->bind_result($pass,$tipo);

            /* obtener valor */
            $identUsuario->fetch();
            $conexion->close();
            if(isset($_POST["passwd"])){
                if(!empty($_POST["passwd"])){
                    if($pass==md5($_POST["passwd"])){
                        
			$_SESSION["usuario"]=$_POST['user'];
                        $_SESSION["tipo"]=$tipo;
                        if($tipo==0){
                            echo "<script language=\"javascript\">window.location=\"paginaAdmin.php\"</script>;";
                        }else{
                            echo "<script language=\"javascript\">window.location=\"paginaProfesor.php\"</script>;";
                        }
                        exit;
                    }else{
                        //echo $pass;
                        //echo md5($_POST["passwd"]);
                        session_destroy();
                        echo "Usuario o contraseña incorrecta 1";
                        echo "<script language=\"javascript\">window.location=\"index.php\"</script>;";
                    }
                }else{
                    session_destroy();
                    echo "Usuario o contraseña incorrecta 2";
                    echo "<script language=\"javascript\">window.location=\"index.php\"</script>;";
                }
            }else{
                session_destroy();
                echo "Usuario o contraseña incorrecta 3";
                echo "<script language=\"javascript\">window.location=\"index.php\"</script>;"; 
            }

        }else{
            session_destroy();
            echo "Usuario o contraseña incorrecta 4";
            echo "<script language=\"javascript\">window.location=\"index.php\"</script>;"; 
        }
    }else{
        session_destroy();
        echo "Usuario o contraseña incorrecta 5";
        echo "<script language=\"javascript\">window.location=\"index.php\"</script>;"; 
    }
?>