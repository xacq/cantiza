<?php

date_default_timezone_set('America/Bogota');  

function saber_dia($fecha){
    $fechats = strtotime($fecha); //pasamos a timestamp
    switch (date('w', $fechats)){
      case 0: return "Domingo"; break;
      case 1: return "Lunes"; break;
      case 2: return "Martes"; break;
      case 3: return "Miercoles"; break;
      case 4: return "Jueves"; break;
      case 5: return "Viernes"; break;
      case 6: return "Sabado"; break;
    } 
  }

$host = "localhost";
$user = "root";
$clave = "";
$bd = "cantiza";

/*$host = "";
$user = "greenpc_cantiza";
$clave = "5UpSn7JemWmQUpPyGjF9";
$bd = "greenpc_cantiza";*/

$conectar = mysqli_connect($host, $user, $clave, $bd);
?>