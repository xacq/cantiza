<?php
    require_once("../config/verificacion.php");
    require_once("../config/link.php");
    if (isset($_POST['cargararchivo']))
    {   
        $nombre = $_FILES['archivo']['name'];
        $tamanio = $_FILES['archivo']['size'];
        $dir = "./documents/";
        $tamano = 5000; //kb
        $permitidos = array('doc','docx','pdf','xlsx','xls','png','jpg', 'jpeg', 'txt');
        $ruta_carga= $dir.$_FILES['archivo']['name'];
        $arregloArchivo = explode(".",$_FILES['archivo']['name']);
        $extension = strtolower(end($arregloArchivo)); //extensiones
        if (!file_exists($dir)){
            mkdir($dir,0777);
        }
        $res = "SELECT so_arc_nombre FROM so_archivos WHERE so_arc_nombre = '$nombre'";
        $resultado = mysqli_query($conectar,$res);
        if ($row = mysqli_fetch_array($resultado)){
            echo '<script> alert("OOPS...! \nEL ARCHIVO YA EXISTE EN EL SERVIDOR. \nINTENTA CON OTRO ARCHIVO.");</script>';
            echo '<script>window.location="./cargar.php"</script>';
        }
        else if (in_array($extension,$permitidos)){
            if ($_FILES['archivo']['size'] < ($tamano*1024)){
                if (move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta_carga))
                {
                    $consulta = "INSERT INTO so_archivos(so_arc_nombre, so_arc_ruta, so_arc_size, so_arc_creacion) 
                    VALUES ('$nombre','$ruta_carga','$tamanio',current_timestamp())";
                    $resultado = mysqli_query($conectar, $consulta);    
                    echo '<script> alert("SE HA CARGADO EL ARCHIVO CORRECTAMENTE.");</script>';
                    echo '<script>window.location="../lists/1.listarchivo.php"</script>';
                }else{
                    echo '<script> alert("OOPS...! \nHUBO UN PROBLEMA EN LA CARGA DEL ACHIVO.");</script>';
                    echo '<script>window.location="./cargar.php"</script>';
                }
            }else{
                echo '<script> alert("OOPS...! \nHUBO UN PROBLEMA EN LA CARGA DEL ACHIVO.");</script>';
                echo '<script>window.location="./cargar.php"</script>';
            }  
        } else{
            echo '<script> alert("OOPS...! \nHUBO UN PROBLEMA EN LA CARGA DEL ACHIVO.");</script>';
            echo '<script>window.location="./cargar.php"</script>';
        }
    }
    require_once("./templates/head.php");
?>
        <form class="form login" action="./cargar.php" method="POST" enctype="multipart/form-data">
            <div class="form_container"> 
                <h4 class="form_title center colver">Sección Archivos</h4>
                <div class="row">
                  <div class="file-field input-field col m8 s10 offset-m2 offset-s2">
                    <div class="btn">
                        <span>Cargar Archivo</span>
                        <input type="file" name="archivo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                  </div>
                </div>
                <div class="row center">
                  <button class="btn waves-effect waves-light grey darken-3" 
                    type="submit" name="cargararchivo" >CARGAR
                    <i class="material-icons right">upload_file</i></button>
                </div>
            </div>
        </form>
        <br><p class="center colver">NOTA: Si al cargar un archivo, tiene problemas podria ser por lo siguiente: <br> el tamaño debe ser maximo de 5MB. o 
                el tipo de archivo no tiene el formato word, excel, pdf, png, jpg o txt. <br> Si el problema persiste, hubo algun problema con el servidor y debe comunicarse con su Servicio de Hosting.</p>
    </main>
<?php require_once("./templates/foot.php"); ?>