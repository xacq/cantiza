<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/headinfo1.php");
    require_once("../templates/info.php");
?>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Seleccionar un Cochero</h4>
                <form class="form login" action="./informacion.php" method="POST">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">people</i>
                        <select name="finca" id="finca" class="validate" required>
                            <?php
                            //Consulta SQL para obtener los nombres de la tabla (reemplaza 'tabla' con el nombre real de tu tabla)
                            $sql = "SELECT * FROM can_usuario WHERE can_usu_tipo = 3";
                            $result = $conectar->query($sql);
                            if ($result->num_rows > 0) {// Si hay resultados, crear opciones para el select
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
                    <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="crearbloque">Asignar Cochero</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col m12 s12 ">
                    <h4 class="form_title center colver">Lista de Finca/Area/Bloque</h4>
                </div>    
            </div>
            <div class="row center">
            <a href="../crear/informacion.php" class="waves-effect waves-light grey darken-3 btn-large"><i class="material-icons right">add</i>Nuevo</a>
        </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>SUPERVISOR</th>
                <th>FINCA</th>
                <th>AREA</th>
                <th>BLOQUE</th>
                <th>ROSA</th>
                <th>TALLO X MALLA</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM can_informacion ORDER BY can_inf_finca asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <a class="delete" href="../del/informacion.php?id=<?php echo $row['can_inf_id']?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                            <i class="material-icons tiny delete">delete_forever</i>BORRAR </a></td>
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_usuario WHERE can_usu_id = '".$row['can_inf_super']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_usu_name'];
                        }?></td>
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
                            echo "BLO".$row2['can_blo_name'];
                        }?></td>
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_rosas WHERE can_ros_id = '".$row['can_inf_rosa']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_ros_name'];
                        }?></td>
                    <td>
                    <td><?php echo $row['can_inf_tallospormalla']?></td>
                </tr>
                <?php  
                }
                ?>
            </tbody>
        </table>
    </div>
    </main>
<?php 
    require_once("./templates/foot.php");
?>