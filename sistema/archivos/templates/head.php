
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DENTAID Smile Studio">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/sso.css">
    <link rel="stylesheet" href="../../assets/css/materialize.css">
    <link rel="icon" href="../../assets/img/favicon.png" type="image/x-icon">

    <title>DENTAID - Crear Usuario</title>
</head>

<body>

<header>
      <div class="container d-flex align-items-center">
        <nav class="nav-extended">

          <div class="nav-wrapper" style="background-color:#45582C">
            <a href="#!" class="brand-logo">
              <img src="../assets/img/logoblanco.png" alt="" width="65px"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
              <i class="material-icons">menu</i></a>
            
              <ul id="nav-mobile" class="right hide-on-med-and-down">

                      <li><a href="../1.configuracion.php">
                        <i class="material-icons left">home</i>Regresar</a></li>
                        <li><a  href="../config/exit.php">
                          <i class="material-icons left">exit_to_app</i>Salir</a></li>
                    </ul>
            </div>
        </nav>
      </div>
    </header>

    <body>
    <main>

    <div class="container">
      <div class="row">
        <div class="col s6">
        <blockquote class=" left colver"><i class="material-icons prefix tiny">manage_accounts</i>  <?php echo $_SESSION['login_name'];?></blockquote>
        </div>
        <div class="col s6">
        <blockquote class=" right colver"><i class="material-icons prefix tiny">calendar_today</i>  <?php echo date("d/m/Y");?></blockquote>
      </div>
      </div>
    </div>