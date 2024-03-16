<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/headasig2.php");
    require_once("../templates/info.php");
    
    $suma_total = 0;
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
                <th>Acción</th>
                <th>F-A-B-R</th>
                <th>COCHERO</th>
                <th>Nº Tallos</th>
                <th>Subtotal</th>
                <th>Creacion</th>
            </tr>
            </thead>

            <tbody>
                <?php

                $query = "SELECT * FROM can_base WHERE can_bas_date_asig = CURDATE() ORDER BY can_bas_create asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <a class="delete" href="../del/asignacion.php?id=<?php echo $row['can_bas_id']?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                            <i class="material-icons tiny delete">delete_forever</i>BORRAR </a>
                        </td>

                    <td>
                        <?php
                            echo $row['can_bas_info'];
                        ?></td>  

                    <td>
                    <?php
                        $query2 = "SELECT * FROM can_usuario WHERE can_usu_id = '".$row['can_bas_worker']."'";
                        $resultado2 = mysqli_query($conectar, $query2);
                        while ($row2 = mysqli_fetch_array($resultado2)){
                            echo $row2['can_usu_name'];
                        }?>
                        </td>

                    <td>
                        <?php
                            echo $row['can_bas_numerodetallos'];
                        ?></td> 

                    <td>
                        <?php
                            $suma_total = $suma_total + $row['can_bas_totalcosecha'];
                            echo $row['can_bas_totalcosecha'];
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

        <div class="row">
            <div class="col m12 s12 ">
                <h5 class="form_title center colver">Resultados de la fecha: <?php echo $suma_total;?> </h5>
            </div>    
        </div>

    </div>



    </main>
    
<?php 
    require_once("./templates/foot.php");
?>