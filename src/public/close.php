<?php
    session_start();
    $_SESSION['logueado'] = false;
    session_unset();
    session_destroy();
    header('Location: vista/index.php');
?>