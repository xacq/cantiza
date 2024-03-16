<?php
session_start();
$ingreso = 'si';
$_SESSION['ing'] = $ingreso;
$_SESSION['login'] = false;
header('location:../ingreso.php');
?>