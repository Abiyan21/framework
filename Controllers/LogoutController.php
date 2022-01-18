<?php
    session_start();
    $_SESSION = array();
    session_destroy();

    header("Location: ../Views/welcome.view.php");
    exit();
?>