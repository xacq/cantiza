<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if(isset($_POST['crearfinca'])){
        $finca = $_POST['finca'];

        $sql = "INSERT INTO can_finca (can_fin_name) 
            VALUES ('$finca')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nFINCA CREADA CORRECTAMENTE.")</script>';
                unset($_POST['crearfinca']);
                echo '<script>window.location="../lists/finca.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR LA FINCA.")</script>';
                unset($_POST['crearfinca']);
                echo '<script>window.location="../lists/finca.php"</script>';
            }
        }
    
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container ">
        <form class="form login" action="./finca.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Fincas</h4>

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                    <i class="material-icons prefix">gite</i>
                    <input id="finca" name="finca" required type="text">
                    <label for="finca">Nombre de la Finca</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE LA NUEVA FINCA</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="crearfinca">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
    </main>


<?php 
    require_once("./templates/foot.php");
?>