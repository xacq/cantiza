<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");

    if(isset($_POST['crearasignacion'])){
      $info = $_GET['id'];
      $worker = $_POST['usuario'];
      $mallas = $_POST['mallas'];
      $super = $_SESSION['login_id'];

      $queryinfo = "SELECT * FROM can_informacion WHERE can_inf_id = $info";
      $busquedainfo = mysqli_query($conectar, $queryinfo);
      $row_info = mysqli_fetch_array($busquedainfo);
      $tallos = $row_info['can_inf_tallospormalla'];
      $total = $mallas * $tallos;

      $sql = "INSERT INTO can_base(can_bas_super, can_bas_worker, can_bas_info, can_bas_numerodemallas, can_bas_numerodetallos, can_bas_totalcosecha) 
      VALUES ('$super','$worker','$info','$mallas','$tallos','$total')";
      $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nREGISTRO CREADO CORRECTAMENTE.")</script>';
                unset($_POST['crearasignacion']);
                $mostrar=0;
                echo '<script>window.location="../lists/asignacion.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL CREAR EL REGISTRO")</script>';
                unset($_POST['crearasignacion']);
                $mostrar=0;
                echo '<script>window.location="../lists/asignacion.php"</script>';
            }
        }
    elseif (isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM can_informacion WHERE can_inf_id = $id";
      $busqueda = mysqli_query($conectar, $query);
      $row_age = mysqli_fetch_array($busqueda);
      }
    require_once("./templates/headinfo.php");
    require_once("../templates/info.php");
?>
      <title>CANTIZA SS WEB</title>
    </head>
<body>

  <main>


    <div class="container">
        <form class="form login" action="./asignacion.php?id=<?php echo $row_age['can_inf_id'];?>" method="POST">
            <div class="form_container "> 
                <h4 class="form_title center colver">Crear Asignacion</h4>

                <div class="row">
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">engineering</i>
                    <select name="usuario" id="usuario" class="validate" required>
                      <?php 
                        $sql = "SELECT * FROM can_usuario WHERE can_usu_tipo = 2";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_usu_id'] . '">' . $row['can_usu_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    <label>Escoja una Usuario</label>
                    </select>
                  </div>

                  <div class="row">
                    <div class="input-field col m8 s10 offset-m2 offset-s2">
                    <i class="material-icons prefix">view_week</i>
                      <input id="mallas" name="mallas" required type="number">
                      <label for="mallas">Número de mallas</label>
                      <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL NUMERO DE MALLAS</span>
                    </div>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                  type="submit" name="crearasignacion">Actualizar
                  <i class="material-icons right">update</i></button>
                </div>

            </div>
        </form>
    </div>

  </main>

<?php
include("./templates/foot.php");
?>