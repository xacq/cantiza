<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/headinfo2.php");
    require_once("../templates/info.php");

    if (isset($_POST['asigcochero'])){

        $cochero = $_POST['usuario'];
        if (isset($_POST['identifier'])) {
            $identifier = $_POST['identifier'];
            // Resto del código aquí
        } else {
            echo "El campo 'identifier' no está definido.";
        }
        $super = $_SESSION['login_id'];
        $tallos = null;
        // Variable que contiene el SQL a ejecutar
        $sql = "SELECT * FROM can_informacion WHERE can_inf_identifier = '$identifier'";

        // Ejecutar el SQL y almacenar el resultado en la variable $busqueda
        $busqueda = mysqli_query($conectar, $sql);

        // Verificar si la consulta fue exitosa
        if ($busqueda) {
            // La consulta fue exitosa, puedes usar el resultado
            // Por ejemplo, puedes obtener el primer resultado de la consulta
            $row_info = mysqli_fetch_array($busqueda);
            // Ahora puedes acceder a los valores del resultado, por ejemplo
            $tallos = $row_info['can_inf_tallospormalla'];
        } else {
            // La consulta no fue exitosa, maneja el error apropiadamente
            echo "Error al ejecutar la consulta: " . mysqli_error($conectar);
        }

        $sql = "INSERT INTO can_base(can_bas_super, can_bas_worker, can_bas_info, can_bas_numerodetallos, can_bas_totalcosecha, can_bas_date_asig, can_bas_create)
                VALUES ('$super','$cochero','$identifier','$tallos',0,CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $busqueda = mysqli_query($conectar, $sql);
        if($busqueda){
            echo '<script>alert("FELICIDADES...! \nASIGNACION CREADA CORRECTAMENTE.")</script>';
            unset($_POST['asigcochero']);
            echo '<script>window.location="../lists/asignacion2.php"</script>';
        }
        else{
            echo '<script>alert("OOPS...! \nERROR AL CREAR LA ASIGNACION.")</script>';
            unset($_POST['asigcochero']);
            echo '<script>window.location="../lists/asignacion2.php"</script>';
        }
    }
    else{
?>

    
    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Lista de Finca/Area/Bloque/Rosa</h4>
            </div>    
        </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>FINCA</th>
                <th>AREA</th>
                <th>BLOQUE</th>
                <th>ROSA</th>
                <th>TAL X MAL</th>
                <th>REF</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $super = $_SESSION['login_id'];
                $query = "SELECT * FROM can_informacion WHERE can_inf_super = $super ORDER BY can_inf_finca asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <a class="edit waves-effect waves-light btn modal-trigger red darken-4 teal-text text-lighten-5" href="#modal1" data-identifier="<?php echo $row['can_inf_identifier'] ?>">COCHERO</a>
                                   
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_finca WHERE can_fin_id = '".$row['can_inf_finca']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_fin_name'];
                        }?></td>
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_area WHERE can_are_id = '".$row['can_inf_areas']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo "AREA".$row2['can_are_name'];
                        }?></td>                        
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_bloque WHERE can_blo_id = '".$row['can_inf_bloque']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo "BLOQUE".$row2['can_blo_name'];
                        }?></td>  
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_rosas WHERE can_ros_id = '".$row['can_inf_rosa']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_ros_name'];
                        }?></td>  
                    <td><?php echo $row['can_inf_tallospormalla']?></td>
                    <td><?php echo $row['can_inf_identifier']?></td>
                </tr>
                <?php  
                }
                ?>
            </tbody>
        </table>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Seleccionar un Cochero</h4>
            <form class="form login" action="./informacion2.php" method="POST">
                <input id="identifier" type="hidden" class="validate" name="identifier">
                <div class="input-field col s8 offset-s2">
                    <i class="material-icons prefix">people</i>
                    <select name="usuario" id="usuario" class="validate" required>
                        <?php
                        //Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                        $sql = "SELECT * FROM can_usuario WHERE can_usu_tipo = 3";
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
                    <label>ESCOJA UN COCHERO</label>
                    </select>
                </div>
                <div class="row center">
                    <button class="btn waves-effect waves-light red darken-4" type="submit" name="asigcochero">Asignar Cochero</button>
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



<?php 
    require_once("./templates/foot.php");}
?>