 <?php
    require_once('configuracionDB.php');
    $sql = "SELECT password,tipo FROM " . TABLA_USUARIO . " WHERE nickname = ?";

    if(isset($_POST["user"])){
        if(!empty($_POST["user"])){
            $conexion=new mysqli('localhost','root','4827','70156169x-2');

            /* comprobar la conexión */
            if (mysqli_connect_errno()) {
                echo "Fallo de conexión";
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
                        echo "<script language=\"javascript\">window.location=\"paginaAdmin.php\"</script>;";
                        exit;
                    }else{
                        //echo $pass;
                        //echo md5($_POST["passwd"]);
                        echo "Usuario o contraseña incorrecta 1";
                        echo "<script language=\"javascript\">window.location=\"index.php\"</script>;";
                    }
                }else{
                    echo "Usuario o contraseña incorrecta 2";
                    echo "<script language=\"javascript\">window.location=\"index.php\"</script>;";
                }
            }else{
                echo "Usuario o contraseña incorrecta 3";
                echo "<script language=\"javascript\">window.location=\"index.php\"</script>;"; 
            }

        }else{
            echo "Usuario o contraseña incorrecta 4";
        }
    }else{
        echo "Usuario o contraseña incorrecta 5";
    }
?>

