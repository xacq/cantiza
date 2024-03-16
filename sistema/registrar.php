<?php
require_once("./config/link.php");
if (isset($_POST['registrar']))
{
  $vara = $_POST['name'];
  $varb = $_POST['cedula'];
  $varc = $_POST['email'];
  $vard = $_POST['telefono'];

  $sql = "INSERT INTO can_usuario (can_usu_name, can_usu_cedula, can_usu_email, can_usu_password, can_usu_phone, can_usu_tipo) 
  VALUES ('$vara','$varb','$varc','9876543210','$vard',4)";
  $result = mysqli_query($conectar, $sql);
      if($result){
          echo '<script>alert("FELICIDADES...! \nUSUARIO CREADO CORRECTAMENTE.")</script>';
          unset($_POST['registrar']);
          mysqli_close($conectar);
          echo '<script>window.location="./ingreso.php"</script>';
      }
      else{
          echo '<script>alert("OOPS...! \nERROR AL CREAR EL DOCUMENTO.")</script>';
          unset($_POST['registrar']);
          mysqli_close($conectar);
          echo '<script>window.location="./registrar.php"</script>';
      }
    }
  require_once("./templates/head.php");
?>
      <title>CANTIZA SS WEB</title>
    </head>
<body>

  <main>

    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <nav class="nav-extended">
          <div class="nav-wrapper" style="background-color:#45582C">
            <a href="#!" class="brand-logo"><img src="../assets/img/logoo.jpg" alt="" width="64px"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a  href="./ingreso.php"><i class="material-icons left">people</i>Ingreso</a></li>
            </ul>
          </div>
        </nav>
      </div>    
      
    <ul class="sidenav" id="mobile-demo">
      <li class="center"><img src="../assets/img/logo.jpg" alt="" width="100px"></li>
      <li><a href="./ingreso.php"><i class="material-icons left">people</i>Ingreso</a></li>
    </ul>

    </header>

    <div class="container">
      <div class="row">
        <div class="col m6 s6 offset-m6 offset-s6">
          <blockquote class=" right colver"><i class="material-icons prefix tiny">calendar_today</i>  <?php echo date("d/m/Y");?></blockquote>
        </div>
      </div>
    </div>

    <div class="container">
        <form class="form login" action="./registrar.php" method="POST">
            <div class="form_container "> 
                <h4 class="form_title center colver">Registro Usuario</h4>

                <div class="row">
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">person</i>
                    <input name="name" id="name" type="text" class="validate" required>
                    <label for="name">Nombres</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU NOMBRE</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">fingerprint</i>
                    <input name="cedula" id="cedula" type="text" class="validate" required>
                    <label for="old_password">Cédula</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU CEDULA</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="email" type="email" class="validate" required>
                    <label for="email">Correo Electrónico</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL CORREO DEL USUARIO</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">phone</i>
                    <input name="telefono" id="telefono" type="text" class="validate" required>
                    <label for="telefono">Teléfono</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU TELEFONO</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                  type="submit" name="registrar">Registrar
                  <i class="material-icons right">send</i></button>
                </div>

            </div>
        </form>
    </div>

  </main>

<?php
include("./templates/foot.php");
?>