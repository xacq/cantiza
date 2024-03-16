<?php
require_once("./config/link.php");
if (isset($_POST['actualizar']))
{
  $vara = $_POST['correo'];
  $varb = $_POST['contra'];
  $varc = $_POST['new_contra'];
  $vard = $_POST['repeat_contra'];
  $consulta = "SELECT * FROM can_usuario WHERE can_usu_email = '$vara'";
  $res_consulta = mysqli_query($conectar, $consulta);
  $correo = mysqli_fetch_array($res_consulta);
  if ($correo > 0){
    if ($correo['can_usu_email'] == $vara && $correo['can_usu_password'] == $varb ){
      if ($varc == $vard){
        //$varc = hash('sha512',$varc);
        $consulta = "UPDATE can_usuario SET can_usu_password='$varc' WHERE can_usu_email = '$vara'";
        $resultado = mysqli_query($conectar, $consulta);
        mysqli_close($conectar);
        echo '<script>alert("FELICIDADES...! \nCONTRASEÑA ACTUALIZADA CORRECTAMENTE.")</script>';
        echo '<script>window.location="./ingreso.php"</script>';
      }
      else{
        echo '<script>alert("LA NUEVA CONTRASEÑA NO COINCIDE...! \nPOR FAVOR INGRESE LA MISMA CONTRASEÑA.")</script>';
        mysqli_close($conectar);
        unset($_POST);
        header("Location: ./actualizar.php", TRUE, 301);
      }
    } 
  }
  else{
    echo '<script>alert("OOPS...! \nEL USUARIO O LA CONTRASEÑA NO ESTAN REGISTRADOS. \nPOR FAVOR INTENTE DE NUEVO.")</script>';
    mysqli_close($conectar);
    unset($_POST);
    header("Location: ./actualizar.php", TRUE, 301);
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
            </ul>
          </div>
        </nav>
      </div>    
      
    <ul class="sidenav" id="mobile-demo">
      <li class="center"><img src="../assets/img/logo.jpg" alt="" width="150px"></li>
      <li><a href="./ingreso.php"><i class="material-icons left">assignment</i>Login</a></li>
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
        <form class="form login" action="./actualizar.php" method="POST">
            <div class="form_container "> 
                <h4 class="form_title center colver">Actualizar Contraseña</h4>

                <div class="row">
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">email</i>
                    <input name="correo" id="email" type="email" class="validate" required>
                    <label for="email">Correo Electrónico</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL CORREO DEL USUARIO</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">fingerprint</i>
                    <input name="contra" id="old_password" type="password" class="validate" required>
                    <label for="old_password">Contraseña Antigua</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE LA ANTIGUA CONTRASEÑA</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">enhanced_encryption</i>
                    <input name="new_contra" id="new_password" type="password" class="validate" required>
                    <label for="new_password">Contraseña Nueva</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE LA NUEVA CONTRASEÑA</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">enhanced_encryption</i>
                    <input name="repeat_contra" id="new_aga_password" type="password" class="validate" required>
                    <label for="new_aga_password">Contraseña Nueva</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE LA NUEVA CONTRASEÑA OTRA VEZ</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                  type="submit" name="actualizar">Actualizar
                  <i class="material-icons right">update</i></button>
                </div>

            </div>
        </form>
    </div>

  </main>

<?php
include("./templates/foot.php");
?>