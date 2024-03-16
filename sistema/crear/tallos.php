<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if(isset($_POST['creartallos'])){
        $tallo = $_POST['tallo'];
        $sql = "INSERT INTO can_tallos_malla (can_tal_mal_number) 
            VALUES ('$tallo')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nNUMERO DE TALLOS CREADO CORRECTAMENTE.")</script>';
                unset($_POST['creartallos']);
                echo '<script>window.location="../lists/tallos.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR NUMERO DE TALLOS.")</script>';
                unset($_POST['creartallos']);
                echo '<script>window.location="../lists/tallos.php"</script>';
            }
        }
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container ">
        <form class="form login" action="./tallos.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Tallos</h4>
                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">group_work</i>
                    <input id="tallo" name="tallo" required type="text">
                    <label for="tallo">Cantidad de Tallos</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE NUMERO DE TALLOS POR MALLA</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="creartallos">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
    </main>


<?php 
    require_once("./templates/foot.php");
?>