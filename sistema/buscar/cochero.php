<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");

    if (isset($_POST['buscarfecha'])){
        $fecha =  $_POST['fecha'];
        $hoy = (date('Y-m-d',time()));
        if ($fecha <= $hoy){
            echo '<script>alert("FECHA BIEN INGRESADA")</script>'; 
        }
        else{
            unset($_POST['buscarfecha']);
            echo '<script>alert("FECHA MAL INGRESADA")</script>';
            echo '<script>window.location="./cochero.php";</script>';
        }
    }
    elseif (isset($_POST['buscarbloque'])){

    }
    else {

    
    ?>

    <div class="container"><div class="row center"><div class="form-container">

        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Busqueda por fecha</h4>
            </div>    
        </div>

        <form action="../buscar/cocherofecha.php" method="POST">
            <div class="input-field col m8 s8"><i class="material-icons prefix">event_available</i>
                <input id="fecha" type="text" class="datepicker" name="fecha">
                <label for="fecha">Buscar lista de asignaciones realizadas por fecha</label>
            </div>
            <div class="input-field col m4 s4">
                <button class="btn waves-effect waves-light grey darken-3" type="submit" name="buscarfecha">Buscar
                    <i class="material-icons right">search</i>
                </button>
            </div>
        </form>

        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Busqueda por Area, Bloque o Flor</h4>
            </div>    
        </div>

        <form action="../buscar/cocherobloque.php" method="POST">
            <div class="input-field col m8 s8"><i class="material-icons prefix">grid_view</i>
                <input style="text-transform: uppercase;" id="bloque" type="text" name="bloque">
                <label for="bloque">Buscar lista de asignaciones realizadas por bloque</label>
            </div>
            <div class="input-field col m4 s4">
                <button class="btn waves-effect waves-light grey darken-3" type="submit" name="buscarbloque">Buscar
                    <i class="material-icons right">search</i>
                </button>
            </div>
        </form>

    </div>


</main>


<?php require_once("./templates/foot.php"); }?>