    <div class="container">
      <div class="row">
        <div class="col m6 s6">
          <blockquote class=" left colver"><i class="material-icons prefix tiny">manage_accounts</i>  Bienvenido <?php echo $_SESSION['login_name'];?>
            <br><i class="material-icons prefix tiny">mail</i> Correo: <?php echo $_SESSION['login_correo'];?>
            </blockquote>        
        </div>
        <div class="col m6 s6">
        <blockquote class=" right colver"><i class="material-icons prefix tiny">calendar_today</i>  <?php echo date("d/m/Y");?>
          <br><i class="material-icons prefix tiny">person</i> <?php echo $_SESSION['login_user'];?></blockquote>
      </div>
      </div>
    </div>