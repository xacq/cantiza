<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");

    if (isset($_POST[ 'buscarbloque' ])){
        $total_fecha=0;
        $bloque =  $_POST['bloque'];
    ?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Resultados de busqueda BLO/AR/FLOR</h4>
            </div>    
        </div>
        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>F-A-B-F</th>
                <th>COCHERO</th>
                <th>TRABAJADOR</th>
                <th>MALLAS</th>
                <th>TALLOS</th>
                <th>SUBTOTAL</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $cochero = $_SESSION['login_id'];
                $query = "SELECT * FROM can_base WHERE can_bas_info LIKE '%$bloque%' AND can_bas_date_asig = CURDATE()";
                $resultado = mysqli_query($conectar, $query);
                if (mysqli_num_rows($resultado) >= 1){
                    while ($row = mysqli_fetch_array($resultado)){
                        $code = $row['can_bas_id'];
                    }

                    $query = "SELECT * FROM can_ingresos WHERE can_ing_base = '$code'";
                    $resultado = mysqli_query($conectar, $query);
                    if (mysqli_num_rows($resultado) >= 1){
                        while ($row = mysqli_fetch_array($resultado)){
                            $total_fecha = $total_fecha + $row['can_ing_subtotal'];?>
                        <tr>
                            <td><?php 
                                $base = $row['can_ing_base']; 
                                $consulta = "SELECT *  FROM can_base WHERE can_bas_id = $base";
                                $res = mysqli_query($conectar, $consulta);
                                if (mysqli_num_rows($res) >= 1){
                                    while ($row2 = mysqli_fetch_array($res)){
                                        echo $row2['can_bas_info'];
                                    }
                                }
                                ?>
                            </td>

                            <td><?php 
                                
                                $consulta = "SELECT *  FROM can_usuario WHERE can_usu_id = $cochero";
                                $res = mysqli_query($conectar, $consulta);
                                if (mysqli_num_rows($res) >= 1){
                                    while ($row2 = mysqli_fetch_array($res)){
                                        echo $row2['can_usu_name'];
                                    }
                                }
                                ?>
                            </td>

                            <td><?php 
                                $trabajador = $row['can_ing_trabajador'];
                                $consulta = "SELECT *  FROM can_usuario WHERE can_usu_id = $trabajador";
                                $res = mysqli_query($conectar, $consulta);
                                if (mysqli_num_rows($res) >= 1){
                                    while ($row2 = mysqli_fetch_array($res)){
                                        echo $row2['can_usu_name'];
                                    }
                                }
                                ?>
                            </td>

                            <td><?php echo $row['can_ing_mallas'];?></td>    
                            <td><?php echo $row['can_ing_tallos'];?></td>  
                            <td><?php echo $row['can_ing_subtotal'];?></td>      
                        </tr>
                        <?php  
                            }}
                    else{
                        echo '<script>alert("OOPS...!  \nNO SE ENCONTRARON RESULTADOS")</script>';
                        echo '<script>window.location="./cochero.php";</script>';
                    }?>
                </tbody>
            </table>

            <div class="row">
                <div class="col m12 s12 ">
                    <h5 class="form_title center colver">Resultados del total hasta el momento:  <?php  echo $total_fecha?> </h5>
                </div>    
            </div>

                    <?php  
                        }
                else{
                    unset($_POST['buscarbloque']);
                    echo '<script>alert("OOPS...!  \nNO SE ENCONTRARON RESULTADOS")</script>';
                    //echo '<script>window.location="./cochero.php";</script>';
                }?>
            </tbody>
        </table>

        </div>
    </main>
    
<?php require_once("./templates/foot.php");
    }
?>