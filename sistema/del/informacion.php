<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
if (isset($_GET['id'])){
        $id = $_GET['id'];
        $consulta = "DELETE FROM can_informacion WHERE can_inf_id = $id";
        $code_result = mysqli_query($conectar,$consulta);
        if($code_result){
            echo '<script>alert("REGISTRO ELIMINADO CORRECTAMENTE")</script>';
            echo '<script>window.location="../lists/informacion2.php"</script>';
        }
        else{
            echo '<script>alert("OOPS...! HUBO UN ERROR AL ELIMINAR EL REGISTRO.")</script>';
            echo '<script>window.location="../lists/informacion2.php"</script>';
        }
}
?>