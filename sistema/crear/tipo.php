<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if(isset($_POST['creartipo'])){
        $tipo = $_POST['tipo'];
        $sql = "INSERT INTO can_tipo (can_tip_name) VALUES ('$tipo')";
        $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nTIPO DE USUARIO CREADO CORRECTAMENTE.")</script>';
                unset($_POST['crearhorario']);
                echo '<script>window.location="../lists/tipo.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR EL TIPO DE USUARIO.")</script>';
                unset($_POST['crearhorario']);
                echo '<script>window.location="../lists/tipo.php"</script>';
            }
        }
    
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container ">
        <form class="form login" action="./tipo.php" method="POST">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Tipos Usuarios</h4>

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">assignment_ind</i>
                    <input id="tipo" name="tipo" class="text" required>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE LA HORA PARA NUEVO HORARIO</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="creartipo">Crear
                    <i class="material-icons right">save</i></button>
                </div>
            </div>
        </form>
        
    </main>


<?php 
    require_once("./templates/foot.php");
?>