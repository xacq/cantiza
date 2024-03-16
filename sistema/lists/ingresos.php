<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">LIsta de ingresos diarios</h4>
            </div>    
        </div>
        <div class="row center">
        <a href="../crear/tipo.php" class="waves-effect waves-light grey darken-3 btn-large"><i class="material-icons right">add</i>Nuevo</a>
    </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>Tipo de Usaurio</th>
            </tr>
            </thead>

            <tbody>
            <?php

                $query = "SELECT * FROM can_registro ORDER BY can_reg_date DESC";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>                    
                    <td>
                    <?php 
                    $user = $row['can_reg_usuario'];
                    $consul = "SELECT * FROM can_usuario WHERE can_usu_id = $user";
                    $res = mysqli_query($conectar, $consul);
                    while ($row2 = mysqli_fetch_array($res)){
                        echo $row2['can_usu_name'];
                    }?> 
                    </td>
                    <td><?php echo $row['can_reg_date']?></td>
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