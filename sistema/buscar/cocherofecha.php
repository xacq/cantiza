<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    require_once("./templates/head.php");
    require_once("../templates/info.php");

    if (isset($_POST[ 'buscarfecha' ])){
        $total_fecha=0;
        $fecha =  $_POST['fecha'];
        $hoy = date('Y-m-d');
        if (strtotime($fecha) !== false) {
            if (strtotime($fecha) <= strtotime($hoy)){
    ?>

    <div class="container">
        <div class="row">
            <div class="col m12 s12 ">
                <h4 class="form_title center colver">Resultados de busqueda por fecha</h4>
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
                $fechacomp = strtotime($fecha);
                $query = "SELECT * FROM can_ingresos WHERE DATE(can_ing_create) = '$fecha'";
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
                    <h5 class="form_title center colver">Resultados del total de la fecha <?php echo $fecha ." : ".$total_fecha?> </h5>
                </div>    
            </div>
        </div>
    </main>
    
<?php require_once("./templates/foot.php");
    }
    else{
        unset($_POST['buscarfecha']);
        echo '<script>alert("FECHA MAL INGRESADA")</script>';
        echo '<script>window.location="./cochero.php";</script>';
    }
    }
    else{
        unset($_POST['buscarfecha']);
        echo '<script>alert("FECHA MAL INGRESADA")</script>';
        echo '<script>window.location="./cochero.php";</script>';
    }
}
?>