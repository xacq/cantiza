<?php
  require_once("./config/verificacion.php");
  require_once("./config/link.php");
  require_once("./templates/head.php");
?>
<title>CANTIZA SS WEB</title>
</head>
<body>
  <main>
    <header id="header" class="fixed-top container">
      <div class=" d-flex align-items-center">
        <nav class="nav-extended">
          <div class="nav-wrapper">
            <a href="#" class="brand-logo"><img src="../assets/img/logoo.jpg" alt="" width="64px"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <?php if ($_SESSION['login_user']== "Administrador"){ ?>
                <li><a  href="./lists/informacion1.php"><i class="material-icons left">feed</i>Asignaciones</a></li> 
                <li><a  href="./administracion.php"><i class="material-icons left">people</i>Administración</a></li> 
              <?php } elseif ($_SESSION['login_user']== "Supervisor"){ ?>
                <li><a  href="./lists/informacion2.php"><i class="material-icons left">feed</i>Asignaciones</a></li>
              <?php } elseif ($_SESSION['login_user']== "Cochero") {?> 
                <li><a  href="./historial.php"><i class="material-icons left">filter_vintage</i>Asi. Diaria</a></li>
                <li><a  href="./lists/historial.php"><i class="material-icons left">list</i>Listado</a></li>
                <li><a  href="./buscar/cochero.php"><i class="material-icons left">find_in_page</i>Buscar</a></li>
                <?php } 
              else { ?> 
                <li><a  href="./lists/historialtrabajador.php"><i class="material-icons left">filter_vintage</i>Asig. Diarias</a></li> 
                <li><a  href="./buscar/trabajadorasignaciones.php"><i class="material-icons left">find_in_page</i>Busqueda</a></li> <?php } ?>  
                
                <li><a href="./config/exit.php"> <i  class="material-icons left">exit_to_app</i>Salir</a></li>
            </ul>
          </div>
        </nav>
      </div>
      
      <ul class="sidenav" id="mobile-demo">
        <?php if ($_SESSION['login_user']== "Administrador"){ ?>
          <li><a  href="./lists/informacion1.php"><i class="material-icons left">feed</i>Asignaciones</a></li> 
          <li><a  href="./administracion.php"><i class="material-icons left">people</i>Administración</a></li> 
        <?php } elseif ($_SESSION['login_user']== "Supervisor"){ ?>
          <li><a  href="./lists/informacion2.php"><i class="material-icons left">feed</i>Asignaciones</a></li>
        <?php } elseif ($_SESSION['login_user']== "Cochero") {?> 
          <li><a  href="./historial.php"><i class="material-icons left">filter_vintage</i>Asi. Diaria</a></li>
          <li><a  href="./lists/historial.php"><i class="material-icons left">list</i>Listado</a></li>
          <li><a  href="./buscar/cochero.php"><i class="material-icons left">find_in_page</i>Buscar</a></li>
          <?php } 
        else { ?> 
          <li><a  href="./lists/historialtrabajador.php"><i class="material-icons left">filter_vintage</i>Asig. Diarias</a></li> 
          <li><a  href="./buscar/trabajadorasignaciones.php"><i class="material-icons left">find_in_page</i>Busqueda</a></li> <?php } ?>  
          
          <li><a href="./config/exit.php"> <i  class="material-icons left">exit_to_app</i>Salir</a></li>
      </ul>
    </header>
  <?php require_once("./templates/info.php"); ?>
  <div class="row">
    <div class="col s12 m12 l12 center"> <img src="../assets/img/logo.jpg" alt="Logo" width="100px"> </div>
    <div class="col m12 s12 ">     <h3 class="form_title center colver">SISTEMA DE CONTROL</h3>  </div> 
    <div class="col m12 s12 ">     <h5 class="form_title center colver">SOFTWARE MIRROR CRM CON APP MOVIL</h5>  </div>  
  </div>
  </main>
  <?php require_once("./templates/foot.php"); ?>

  <script type="text/javascript" src="../assets/js/materialize.js"></script>
  <script type="text/javascript" src="../assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      M.AutoInit();
    });
  </script> 
  <script type="text/javascript">
    function valida_cedula() {
      var cad = document.getElementById("cedula").value.trim();
      var total = 0;
      var longitud = cad.length;
      var longcheck = longitud - 1;
      if (cad !== "" && longitud === 10){
        for(i = 0; i < longcheck; i++){
          if (i%2 === 0) {
            var aux = cad.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
          } else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
          }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        if (cad.charAt(longitud-1) != total) {
          document.getElementById("cedula").value = ("0");
        }
      }
    }
  </script>
  <script>
    function confirmar ( mensaje ) {
      return confirm( mensaje );
    }
  </script>
</body>
</html>