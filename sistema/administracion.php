<?php
  require_once("./config/verificacion.php");
  require_once("./config/link.php");
  require_once("./templates/head.php");
?>
<title>CANTIZA SS WEB</title>
</head>
<body>

<header id="header" class="fixed-top container">
      <div class=" d-flex align-items-center">
        <nav class="nav-extended">
          <div class="nav-wrapper">
          <a href="#" class="brand-logo"><img src="../assets/img/logoo.jpg" alt="" width="64px"></a>  
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><i class="material-icons left">settings_suggest</i></li>
              <li><a  class="dropdown-trigger" href="./configuracion.php">Sistema</a></li>
              <li><a href="./menu.php"><i class="material-icons left">home</i>Inicio</a></li>
              <li><a  href="./config/exit.php"><i class="material-icons left">exit_to_app</i>Salir</a></li>
            </ul>
          </div>
          <ul id="dropdown1" class="dropdown-content">
            <li><a href="./crear/1.crearmedico.php">Nuevo</a></li>
            <li><a href="./lists/1.listmedico.php">Lista</a></li>
          </ul>
        </nav>
      </div>
      
      <ul class="sidenav" id="mobile-demo">
        <li class="center"><img src="../assets/img/logo.jpg" alt="" width="100px"></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Nuevo</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Lista</a></li>
        <li><a  class="dropdown-trigger" href="./1.configuracion.php">Sistema</a></li>
        <li><a href="./menu.php"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a  href="./config/exit.php"><i class="material-icons left">exit_to_app</i>Salir</a></li>
      </ul>

</header>

<main>
<?php require_once("./templates/info.php"); ?>
  <div class="row">
    <div class="col s12 m12 l12 center"> <img src="../assets/img/logo.jpg" alt="Logo" width="200px"> </div>
    <div class="col m12 s12 "><h3 class="form_title center colver">ADMINISTRACION</h3></div>  
  </div>

  <div class="container"><div class="row center"><div class="form-container">
    <form action="./buscar/trabajador.php" method="POST">
      <div class="input-field col m8 s8"><i class="material-icons prefix">people</i>
      <input id="trabajador" type="text" class="validate" name="trabajador"><label for="medico">Buscar trabajador</label></div>
        <div class="input-field col m4 s4"><button class="btn waves-effect waves-light grey darken-3" type="submit" name="buscartrabajador">Buscar
          <i class="material-icons right">search</i></button></div></form>
      </div>
    </div>
  </div>
</main>
<?php
require_once("./templates/foot.php");
?>