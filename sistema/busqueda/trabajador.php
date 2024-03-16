<?php
  require_once("../config/verificacion.php");
  require_once("../config/link.php");
  require_once("./templates/head.php");
    require_once("./templates/info.php"); ?>

  <div class="row">
    <div class="col s12 m12 l12 center"> <img src="../../assets/img/logo.jpg" alt="Logo" width="200px"> </div>
    <div class="col m12 s12 "><h3 class="form_title center colver">ADMINISTRACION</h3></div>  
  </div>

  <div class="container"><div class="row center"><div class="form-container">
    <form action="../buscar/trabajadorasignaciones.php" method="POST">
        <div class="input-field col m8 s8"><i class="material-icons prefix">event_available</i>
            <input id="fecha" type="text" class="datepicker" name="fecha">
            <label for="fecha">Buscar lista de asignaciones realizadas por fecha</label>
        </div>
        <div class="input-field col m4 s4">
            <button class="btn waves-effect waves-light grey darken-3" type="submit" name="buscartrabajador">Buscar
                <i class="material-icons right">search</i>
            </button>
        </div>
    </form>
      </div>
    </div>
  </div>
</main>



<?php require_once("./templates/foot.php"); ?>