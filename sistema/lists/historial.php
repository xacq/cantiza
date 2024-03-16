<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/headhistorial.php");
    require_once("../templates/info.php");

    $subtotal_dia = 0;
?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Asignaciones Diarias</h4>
            </div>    
        </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>F-A-B-R</th>
                <th>TRABAJADOR</th>
                <th>Nº Mallas</th>
                <th>Nº Tallos</th>
                <th>Subtotal</th>
                <th>Creacion</th>
            </tr>
            </thead>

            <tbody>
                <?php
                $cochero = $_SESSION['login_id'];
                $query = "SELECT * FROM can_ingresos WHERE can_ing_cochero = $cochero AND DATE(can_ing_create) = CURDATE()";

                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <?php
                            $id = $row['can_ing_base'];
                            $consulta = "SELECT * FROM can_base WHERE can_bas_id = $id";
                            $resul = mysqli_query($conectar, $consulta);
                            while ($row2 = mysqli_fetch_array($resul)){
                                echo $row2['can_bas_info'];
                            }   
                        ?></td>  

                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_usuario WHERE can_usu_id = '".$row['can_ing_trabajador']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_usu_name'];
                        }?>
                        </td>

                    <td>
                    <?php
                            echo $row['can_ing_mallas'];
                        ?></td>  

                    <td>
                        <?php
                            echo $row['can_ing_tallos'];
                        ?></td> 

                    <td>
                        <?php
                                echo $row['can_ing_subtotal'];
                                $subtotal = $row['can_ing_subtotal'];
                                $subtotal_dia = $subtotal_dia + $subtotal;
                            ?></td> 

                    <td>
                        <?php
                                echo $row['can_ing_create'];
                            ?></td>  
                </tr>
                <?php  
                }
                ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col m12 s12 ">
                <h5 class="form_title center colver">Total de Produccion: <?php echo $subtotal_dia?></h5>
            </div>    
        </div>

    </div>



    </main>
    
<?php 
    require_once("./templates/foot.php");
?>