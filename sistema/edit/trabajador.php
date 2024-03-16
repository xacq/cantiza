<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");

    if(isset($_POST['editarusuario'])){
      $id = $_GET['id'];
      $nombre = $_POST['name'];
      $email = $_POST['email'];
      $cedula = $_POST['cedula'];
      $telefono = $_POST['telefono'];
      $tipo = $_POST['tipo'];
      $sql = "UPDATE can_usuario SET 
            can_usu_name = '$nombre',
            can_usu_cedula = '$cedula',
            can_usu_email = '$email',
            can_usu_phone = '$telefono',
            can_usu_tipo = '$tipo'
            WHERE can_usu_id = $id";

      $result = mysqli_query($conectar, $sql);
            if($result){
                echo '<script>alert("FELICIDADES...! \nUSUARIO EDITADO CORRECTAMENTE.")</script>';
                unset($_POST['editarusuario']);
                $mostrar=0;
                echo '<script>window.location="../lists/trabajador.php"</script>';
            }
            else{
                echo '<script>alert("OOPS...! \nERROR AL EDITAR USUARIO.")</script>';
                unset($_POST['editarusuario']);
                $mostrar=0;
                echo '<script>window.location="../lists/trabajador.php"</script>';
            }
        }
    elseif (isset($_GET['id'])){
      $id = $_GET['id'];
      $mostrar=1;
      $query = "SELECT * FROM can_usuario WHERE can_usu_id = $id";
      $busqueda = mysqli_query($conectar, $query);
      $row_age = mysqli_fetch_array($busqueda);
      }
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>
      <title>CANTIZA SS WEB</title>
    </head>
<body>

  <main>


    <div class="container">
        <form class="form login" action="./trabajador.php?id=<?php echo $row_age['can_usu_id'];?>" method="POST">
            <div class="form_container "> 
                <h4 class="form_title center colver">Editar Usuario</h4>

                <div class="row">
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">person</i>
                    <?php 
                      echo '<input name="name" id="name" type="text" class="validate" required value="'.$row_age['can_usu_name'].'">';
                    ?>
                    <label for="name">Nombres</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU NOMBRE</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">fingerprint</i>
                    <?php 
                      echo '<input name="cedula" id="cedula" type="text" class="validate" required value="'.$row_age['can_usu_cedula'].'">';
                    ?>
                    
                    <label for="old_password">Cédula</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU CEDULA</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">email</i>
                    <?php 
                      echo '<input name="email" id="email" type="email" class="validate" required value="'.$row_age['can_usu_email'].'">';
                    ?>
                    
                    <label for="email">Correo Electrónico</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL CORREO DEL USUARIO</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">phone</i>
                    <?php 
                      echo '<input name="telefono" id="telefono" type="text" class="validate" required value="'.$row_age['can_usu_phone'].'">';
                    ?>
                    
                    <label for="telefono">Teléfono</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE SU TELEFONO</span>
                  </div>

                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">group_add</i>

                    <select name="tipo" id="tipo" class="validate" required>
                      <option > <?php echo $row_age['can_usu_tipo'];?> </option>
                    <?php 
                        
                        // Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_tipo";
                        $result = $conectar->query($sql);
                        // Si hay resultados, crear opciones para el select
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['can_tip_id'] . '">' . $row['can_tip_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No hay nombres disponibles</option>';
                        }
                      ?>
                    </select>
                    <span class="helper-text" data-error="wrong" data-success="right">SELECCIONE EL TIPO DE USUARIO</span>
                  </div>
                </div>

                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                  type="submit" name="editarusuario">Actualizar
                  <i class="material-icons right">update</i></button>
                </div>

            </div>
        </form>
    </div>

  </main>

<?php
include("./templates/foot.php");
?>