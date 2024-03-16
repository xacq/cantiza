<?php
  require_once("./config/verificacion.php");
  require_once("./config/link.php");
  require_once("./templates/head.php");

  if (isset($_POST['asigingreso'])){
    $total = 0;
    $trabajador = $_POST['trabajador'];
    $identifier = $_POST['identifier'];
    $cochero = $_SESSION['login_id'];
    $malla = $_POST['malla'];
    $tallos_extra = $_POST['tallosextra'];
    if ($tallos_extra == 0){
      $tallosdb = null;
      $sql = "SELECT * FROM can_base WHERE can_bas_id = '$identifier'";
      $busqueda = mysqli_query($conectar, $sql);
      if ($busqueda) {
          $row_info = mysqli_fetch_array($busqueda);
          $tallosdb = $row_info['can_bas_numerodetallos'];
      } else {
          echo "Error al ejecutar la consulta: " . mysqli_error($conectar);
      }
    } else {
      $tallosdb = $tallos_extra;
    }
    $subtotal = intval($tallosdb) * intval($malla);
    $sql = "INSERT INTO can_ingresos(can_ing_base,can_ing_cochero, can_ing_trabajador, can_ing_mallas, can_ing_tallos, can_ing_subtotal, can_ing_create) 
            VALUES ('$identifier','$cochero','$trabajador','$malla','$tallosdb','$subtotal', CURRENT_TIMESTAMP)";
    $busqueda = mysqli_query($conectar, $sql);

    $consulta =  "SELECT * FROM can_base WHERE can_bas_id = '$identifier'";
    $res = mysqli_query($conectar, $consulta);
    if ($res) {
      $row_info = mysqli_fetch_array($res);
      $total = $row_info['can_bas_totalcosecha'];
    }

    $total = intval($total) + intval($subtotal);  
    echo $total;
    echo $identifier;
    $update = "UPDATE can_base SET 
      can_bas_totalcosecha = '$total'
      WHERE can_bas_id = '$identifier'";
    $busqueda = mysqli_query($conectar, $update);

    if($busqueda){

        echo '<script>alert("FELICIDADES...! \nINGRESO CREADO CORRECTAMENTE.")</script>';
        unset($_POST['asigingreso']);
        echo '<script>window.location="./lists/historial.php"</script>';
    }
    else{
        echo '<script>alert("OOPS...! \nERROR AL CREAR EL INGRESO.")</script>';
        unset($_POST['asigingreso']);
        echo '<script>window.location=".lists/historial.php"</script>';
    }
}
else{


?>
  <title>CANTIZA SS WEB</title>
  </head>
<body>

<header id="header" class="fixed-top container">
      <div class=" d-flex align-items-center">
        <nav class="nav-extended">
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img src="../assets/img/logoo.jpg" alt="" width="64px"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">     
                <li><a  href="./menu.php"><i class="material-icons left">home</i>Regresar</a></li>        
                <li><a href="../index.html"><i class="material-icons left">exit_to_app</i>Salir</a></li>
              </ul>
          </div>
        
        </nav>
      </div>
      <ul class="sidenav" id="mobile-demo">
        <li><a  href="./menu.php"><i class="material-icons left">home</i>Regresar</a></li>        
                <li><a href="../index.html"><i class="material-icons left">exit_to_app</i>Salir</a></li>
      </ul>      
</header>

    <main>  

    <?php
    require_once("./templates/info.php"); 
    ?>
  <div class="container">

  <div class="row">
      <div class="col s12 m12 l12 center"> 
        <img src="../assets/img/logo.jpg" alt="Logo" width="100px"> 
      </div>
      <div class="col m12 s12 ">
        <h5 class="form_title center colver">ASIGNACION PARA HOY</h5>
      </div>  
      
      <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>F-A-B-R</th>
                <th>Nº Tallos</th>
                <th>Creacion</th>
            </tr>
            </thead>

            <tbody>
                <?php
                $worker = $_SESSION['login_id'];
                $query = "SELECT * FROM can_base  WHERE can_bas_worker = $worker AND can_bas_date_asig = CURDATE() ORDER BY can_bas_create asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <a class="edit modal-trigger red-text" href="#modal1" data-identifier="<?php echo $row['can_bas_id'] ?>">INGRESAR</a>
                        </td>

                    <td>
                        <?php
                            echo $row['can_bas_info'];
                        ?></td>  

                    <td>
                        <?php
                            echo $row['can_bas_numerodetallos'];
                        ?></td> 
                    <td>
                        <?php
                                echo $row['can_bas_create'];
                            ?></td>  
                </tr>
                <?php  
                }
                ?>
            </tbody>
        </table>

    </div>

  
  </div>
  
  <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Registro de Producción</h4>
            <form class="form login" action="./historial.php" method="POST">
                <input placeholder="Placeholder" id="identifier" type="hidden" class="validate" name="identifier">
                
                <div class="row">
                  <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">people</i>
                    <select name="trabajador" id="trabajador" class="validate" required>
                        <?php
                        //Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_usuario WHERE can_usu_tipo = 4";
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
                    <label>ESCOJA UN TRABAJADOR</label>
                    </select>
                  </div>
                </div>  

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">tag</i>
                    <input id="malla" name="malla" required type="text">
                    <label for="malla">Numero de Mallas</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE EL NUMERO DE MALLAS</span>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col m8 s10 offset-m2 offset-s2">
                  <i class="material-icons prefix">yard</i>
                    <input id="tallosextra" name="tallosextra" required type="text" value='0'>
                    <label for="tallosextra">Numero de tallos extra</label>
                    <span class="helper-text" data-error="wrong" data-success="right">INGRESE Nº. TALLOS SI ES MENOR A LO NORMAL</span>
                  </div>
                </div>


                <div class="row center">
                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="asigingreso">Guardar Producción</button>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>

</main>   
    

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

$(document).ready(function() {
    $('#modal1').modal({
        ready: function(modal, trigger) {
            var identifier = $(trigger).attr('data-identifier');
            console.log(identifier);
            // Usar el valor del identificador aquí, p.ej., almacenarlo en un campo de entrada oculto
            $('#identifier').val(identifier);
        }
    });

    // Agregar evento click a los botones <a>
    $('a.modal-trigger').click(function() {
        var identifier = $(this).attr('data-identifier');
        console.log(identifier);
        $('#identifier').val(identifier);
    });
});


</script>

<?php require_once("./templates/foot.php"); } ?>