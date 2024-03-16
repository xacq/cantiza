<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container">

        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Buscar asignaciones</h4>
            </div>    
        </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>F-A-B-R</th>
                <th>COCHERO</th>
                <th>Nº Mallas</th>
                <th>Nº Tallos</th>
                <th>Subtotal</th>
                <th>Creacion</th>
            </tr>
            </thead>

            <tbody>
                <?php
                $trabajador = $_SESSION['login_id'];
                $query = "SELECT * FROM can_ingresos WHERE can_ing_trabajador = $trabajador AND DATE(can_ing_create) = CURDATE()";

                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <?php
                            echo $row['can_ing_base'];
                        ?></td>  
                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_usuario WHERE can_usu_id = '".$row['can_ing_cochero']."'";
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

    </div>

    </main>
    
<?php 
    require_once("./templates/foot.php");
?>