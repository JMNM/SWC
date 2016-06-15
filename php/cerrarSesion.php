<?php
    session_start();
    unset($_SESSION['usuario']); 
    unset($_SESSION['tipo']);
    session_destroy();
    echo "<script language=\"javascript\">window.location=\"../index.php\"</script>";
?>