<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if(isset($_POST['crearrosas'])){
        $rosa = $_POST['rosa'];
        $sql = "INSERT INTO can_rosas (can_ros_name) 
            VALUES ('$rosa')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nROSA CREADA CORRECTAMENTE.")</script>';
                unset($_POST['crearrosas']);
                echo '<script>window.location="../lists/rosas.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR TIPO DE ROSA.")</script>';
                unset($_POST['crearrosas']);
                echo '<script>window.location="../lists/rosas.php"</script>';
            }
        }
    
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container ">
        <form class="form login" action="./rosas.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Rosas</h4>
                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">yard</i>
                    <input id="rosa" name="rosa" required type="text">
                    <label for="rosa">Nombre de la Rosa</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE TIPO DE ROSA</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="crearrosas">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
    </main>


<?php 
    require_once("./templates/foot.php");
?>