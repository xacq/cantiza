<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");

    if(isset($_POST['crearbloque'])){
        $bloque = $_POST['bloque'];
        $bloque = $bloque; 

        $sql = "INSERT INTO can_bloque (can_blo_name) 
            VALUES ('$bloque')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nBLOQUE CREADO CORRECTAMENTE.")</script>';
                unset($_POST['crearbloque']);
                echo '<script>window.location="../lists/bloque.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR EL BLOQUE.")</script>';
                unset($_POST['crearbloque']);
                echo '<script>window.location="../lists/bloque.php"</script>';
            }
        }
    
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>
    <div class="container ">
        <form class="form login" action="./bloque.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Bloques</h4>

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">grid_view</i>
                    <input id="bloque" name="bloque" required type="text">
                    <label for="bloque">Nombre del bloque</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL BLOQUE</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="crearbloque">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
    </main>


<?php 
    require_once("./templates/foot.php");
?>