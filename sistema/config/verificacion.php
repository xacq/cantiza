<?php
    session_start();
    if ($_SESSION['login'] != true){
        echo '<script>alert("OOPS...!  \nUSUARIO NO REGISTRADO")</script>';
        unset($_POST);
        session_destroy();
        header("Location: ../ingreso.php", true, 301);
        echo '<script>window.location="../ingreso.php";</script>';
        exit();
    }
?>