<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");
?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Lista de Tallos</h4>
            </div>    
        </div>
        <div class="row center">
        <a href="../crear/rosas.php" class="waves-effect waves-light grey darken-3 btn-large"><i class="material-icons right">add</i>Nuevo</a>
    </div>

        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>Tallos por Malla</th>
            </tr>
            </thead>

            <tbody>
            <?php

                $query = "SELECT * FROM can_tallos_malla ORDER BY can_tal_mal_number asc";
                $resultado = mysqli_query($conectar, $query);
                while ($row = mysqli_fetch_array($resultado)){?>
                <tr>
                    <td>
                        <a class="delete" href="../del/tallos.php?id=<?php echo $row['can_tal_mal_id']?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                            <i class="material-icons tiny delete">delete_forever</i>BORRAR </a></td>
                    
                    <td><?php echo $row['can_tal_mal_number']?></td>
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