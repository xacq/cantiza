<?php
  require_once("./config/verificacion.php");
  date_default_timezone_set('America/Bogota');  
  require_once("./templates/head.php") ?>
  <title>CANTIZA SS WEB</title>
  </head>
<body>
  <header id="header" class="fixed-top container">
      <div class=" d-flex align-items-center">
        <nav class="nav-extended">
          <div class="nav-wrapper" style="background-color:#45582C">
            <a href="#!" class="brand-logo"><img src="../assets/img/logoo.jpg" alt="" width="64px"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown0" ><i class="material-icons left">settings_suggest</i>Crear</a></li> 
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1" >Listas</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Tipos</a></li>
                <li><a href="./administracion.php"><i class="material-icons left">home</i>Regresar</a></li>
                <li><a  href="./config/exit.php"><i class="material-icons left">exit_to_app</i>Salir</a></li>
              </ul>
          </div>
                <ul id="dropdown0" class="dropdown-content">
                  <li><a href="./crear/finca.php">Finca</a></li>
                  <li><a href="./crear/area.php">Area</a></li>
                  <li><a href="./crear/bloque.php">Bloque</a></li>
                  <li><a href="./crear/rosas.php">Rosas</a></li>
                  <li><a href="./crear/tallos.php">Nº Tallos</a></li>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="./lists/finca.php">Finca</a></li>
                  <li><a href="./lists/area.php">Area</a></li>
                  <li><a href="./lists/bloque.php">Bloque</a></li>
                  <li><a href="./lists/rosas.php">Rosas</a></li>
                  <li><a href="./lists/trabajador.php">Trabajadores</a></li>

                </ul>
                <ul id="dropdown3" class="dropdown-content">
                  <li><a href="./crear/tipo.php">Tipos</a></li>
                  <li><a href="./lists/tipo.php">Listar</a></li>
                  <li><a href="./lists/ingresos.php">Ingresos</a></li>
                </ul>
        </nav>
      </div>
    </header>

  <main>  
    
    <?php require_once("./templates/info.php"); ?>

    <div class="row">
    <div class="col s12 m12 l12 center"> <img src="../assets/img/logo.jpg" alt="Logo" width="300px"> </div>
    <div class="col m12 s12 ">     <h3 class="form_title center colver">SISTEMA DE CONTROL</h3>  </div> 
    <div class="col m12 s12 ">     <h5 class="form_title center colver">CONFIGURACION</h5>  </div>  
    </div>

  </main>

<?php
require_once("./templates/foot.php");
?>