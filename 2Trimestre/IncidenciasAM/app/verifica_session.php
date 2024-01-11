<?php
    session_set_cookie_params(120);
    session_start();
    if($_SESSION['viene']=="si"){
        $usuario=$_SESSION['usuario'];
    }
    else{
        header('Location: http://anderolivos.thsite.top/mysql2/index.php');
        session_abort();
        die();
    }
?>