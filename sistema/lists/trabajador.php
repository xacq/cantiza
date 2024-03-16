<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");

    ?>
    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Listas de Usuarios</h4>
            </div>    
        </div>
        <table class="highlight centered responsive-table">
            <thead>
            <tr>
                <th>Acción</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Tipo</th>
            </tr>
            </thead>

            <tbody>
            <?php
                
                $query = "SELECT * FROM can_usuario ORDER BY can_usu_name asc";
                $resultado = mysqli_query($conectar, $query);
                if (mysqli_num_rows($resultado) >= 1){
                    while ($row = mysqli_fetch_array($resultado)){?>
                    <tr>
                        <td><a class="edit" href="../edit/trabajador.php?id=<?php echo $row['can_usu_id']?>" onclick="return confirmar('¿Está seguro que desea editar el registro?')">
                                <i class="material-icons tiny edit">edit</i>EDITAR</a>
                            <a class="delete" href="../del/trabajador.php?id=<?php echo $row['can_usu_id']?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">
                                <i class="material-icons tiny delete">delete_forever</i>BORRAR </a></td>
                        
                        <td><?php echo $row['can_usu_name']?></td>
                        <td><?php echo $row['can_usu_email']?></td>
                        <td><?php echo $row['can_usu_phone']?></td>
                        <td>
                            <?php
                                $query2 = "SELECT * FROM can_tipo WHERE can_tip_id = '".$row['can_usu_tipo']."'";
                                $resultado2 = mysqli_query($conectar, $query2);
                                while ($row2 = mysqli_fetch_array($resultado2)){
                                    echo $row2['can_tip_name'];
                                }
                            ?></td>
                    </tr>
                    <?php  
                        }}
                else{
                    echo '<script>alert("OOPS...!  \nNO SE ENCONTRARON RESULTADOS")</script>';
                    if ($_SESSION['login_user']==1){
                        echo '<script>window.location="../1.administracion.php"</script>';
                    }
                    elseif ($_SESSION['login_user']==2){
                        echo '<script>window.location="../2.contabilidad.php"</script>';
                    }
                    elseif ($_SESSION['login_user']==3){
                        echo '<script>window.location="../3.medicogeneral.php"</script>';
                    }
                }?>
            </tbody>
        </table>
        </div>
    </main>
    
<?php require_once("./templates/foot.php"); ?>