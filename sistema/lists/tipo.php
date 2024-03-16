<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Lista de Tipos de Usuarios</h4>
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

                $query = "SELECT * FROM can_tipo ORDER BY can_tip_name asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>    <a class="delete" href="../del/tipo.php?id=<?php echo $row['can_tip_id']?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                            <i class="material-icons tiny delete">delete_forever</i>BORRAR </a></td>
                    
                    <td><?php echo $row['can_tip_name']?></td>
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