<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/headinfo.php");
    require_once("../templates/info.php");

    if(isset($_POST['crearbloque'])){
      $usuario = $_POST['usuario'];
      $finca = $_POST['finca'];
      $area = $_POST['area'];
      $bloque = $_POST['bloque'];
      $rosa = $_POST['rosa'];
      
      $consulta = "SELECT * FROM can_rosas WHERE can_ros_id = $rosa";
      $busqueda = mysqli_query($conectar, $consulta);
      if (mysqli_num_rows($busqueda) >= 1){
        while ($row = mysqli_fetch_array($busqueda)){
          $nrosa = $row['can_ros_name'];
        }
         
      }
      $identifier = $finca."-AR".$area."-BL".$bloque."-".$nrosa; 
      $tallos = $_POST['tallos'];
      $sql = "INSERT INTO can_informacion(can_inf_super, can_inf_finca, can_inf_areas, can_inf_bloque, can_inf_rosa,can_inf_identifier, can_inf_tallospormalla) 
              VALUES ('$usuario','$finca','$area','$bloque','$rosa','$identifier','$tallos')";
      $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nREGISTRO CREADO CORRECTAMENTE.")</script>';
                unset($_POST['crearbloque']);
                $mostrar=0;
                echo '<script>window.location="../lists/informacion1.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR EL REGISTRO")</script>';
                unset($_POST['crearbloque']);
                $mostrar=0;
                echo '<script>window.location="../lists/informacion1.php"</script>';
            }
        }
        else{
?>
      <title>CANTIZA SS WEB</title>
    </head>
<body>
  <main>
    <div class="container">
        <form class="form login" action="./informacion.php" method="POST" novalidate>
            <div class="form_container "> 
                <h4 class="form_title center colver">Crear Asignacion Supervisores</h4>
                <div class="row">

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">people</i>
                    <select name="usuario" id="usuario" class="validate" required>
                      <?php
                        $sql = "SELECT * FROM can_usuario WHERE can_usu_tipo = 2";
                        $result = $conectar->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_usu_id'] . '">' . $row['can_usu_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }  
                        ?>
                    <label>Escoja una Finca</label>
                    </select>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">gite</i>
                    <select name="finca" id="finca" class="validate" required>
                      <?php
                       //Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_finca";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_fin_id'] . '">' . $row['can_fin_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }  
                        ?>
                    <label>Escoja una Finca</label>
                    </select>
                  </div>
 
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">area_chart</i>
                    <select name="area" id="area" class="validate" required>
                      <?php 
                        // Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_area";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_are_id'] . '">' ."AREA". $row['can_are_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    <label>Escoja un Area</label>
                    </select>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">grid_view</i>
                    <select name="bloque" id="bloque" class="validate" required>
                      <?php 
                        // Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_bloque";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_blo_id'] . '">' ."BLOQUE" .$row['can_blo_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    <label>Escoja un Bloque</label>
                    </select>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">local_florist</i>
                    <select name="rosa" id="rosa" class="validate" required>
                      <?php 
                        // Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_rosas";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_ros_id'] . '">' . $row['can_ros_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    <label>Escoja una Rosa</label>
                    </select>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">fence</i>
                    <select name="tallos" id="tallos" class="validate" required>
                      <?php 
                        // Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_tallos_malla";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_tal_mal_number'] . '">' . $row['can_tal_mal_number'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    <label>Escoja una Rosa</label>
                    </select>
                  </div>

                </div>
                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" type="submit" name="crearbloque">Crear<i class="material-icons right">update</i></button>
                </div>

            </div>
        </form>
    </div>
  </main>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php
include("./templates/foot.php");}
?>