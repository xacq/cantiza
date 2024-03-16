<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if(isset($_POST['creararea'])){
        $area = $_POST['area'];

        $sql = "INSERT INTO can_area (can_are_name) 
            VALUES ('$area')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nAREA CREADA CORRECTAMENTE.")</script>';
                unset($_POST['creararea']);
                echo '<script>window.location="../lists/area.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR EL AREA.")</script>';
                unset($_POST['creararea']);
                echo '<script>window.location="../lists/area.php"</script>';
            }
        }
    
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container ">
        <form class="form login" action="./area.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Area</h4>

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">area_chart</i>
                    <input id="area" name="area" required type="text">
                    <label for="area">Nombre del area</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL AREA</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="creararea">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
    </div> 
    
    </main>
<?php 
    require_once("./templates/foot.php");
?>