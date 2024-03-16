<?php
session_start();
session_destroy();
session_start();
$ingreso = 'si';
$_SESSION['ing'] = $ingreso;
$_SESSION['login'] = false;
header("location:../ingreso.php", true, 301);
?>
