<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
if (isset($_GET['id'])){
        $id = $_GET['id'];
        $consulta = "DELETE FROM can_area WHERE can_are_id = $id";
        $code_result = mysqli_query($conectar,$consulta);
        if($code_result){
            echo '<script>alert("REGISTRO ELIMINADO CORRECTAMENTE")</script>';
            echo '<script>window.location="../lists/area.php"</script>';
        }
        else{
            echo '<script>alert("OOPS...! HUBO UN ERROR AL ELIMINAR EL REGISTRO.")</script>';
            echo '<script>window.location="../lists/area.php"</script>';
        }
}
?>