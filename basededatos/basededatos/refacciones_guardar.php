<?php
include 'inc/conexion.php';

    $refaccion_id = "";
    $marca_id_post = $_POST['marca_id'];
    $nombre_refaccion_post = strtoupper($_POST['nombre_de_refaccion']);
    $descripcion_refaccion_post = strtoupper($_POST['descripcion_de_refaccion']);
    $refaccion_imagen="imgRefacciones/default.jpg";

    $sel = $con->prepare("SELECT refaccion_id,marca_id,refaccion_nombre FROM refaccion where marca_id=? AND refaccion_nombre=?");
    $sel->bind_param('is', $marca_id_post, $nombre_refaccion_post);
    $sel->execute();
    $res = $sel->get_result();
    $row = mysqli_num_rows($res);
    if ($row != 0) {
        echo "YA EXISTE LA REFACCI&Oacute;N " . $nombre_refaccion_post . " PARA LA MARCA SELECCIONADA";
        echo "¿Deseas agregarle un nuevo precio de proveedor?";
        echo "<a href=\"refacciones_proveedores.php?refaccion_id=" . $refaccion_id . "&refaccion_nombre=" . $nombre_refaccion_post . "\" class=\"btn btn-primary\" role=\"button\"> AGREGAR </a>";
        echo "<a href=\"index.php\" class=\"btn btn-default\" role=\"button\"> CANCELAR </a>";
    }else{
        $ins = $con->prepare("INSERT INTO refaccion VALUES(?,?,?,?,?)");
        $ins->bind_param("iisss", $id, $marca_id_post, $nombre_refaccion_post, $descripcion_refaccion_post, $refaccion_imagen);
            if ($ins->execute()) {
                $lastId = "noWhile";
                $extension = '';
                $ruta = 'imgRefacciones';
                $archivo = $_FILES['foto']['tmp_name'];
                $namearchivo = $_FILES['foto']['name'];
                $info = pathinfo($namearchivo);
                if ($archivo != ''){ 
                    $extension = $info['extension'];
                    if($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG"){
                        $sl = $con->prepare("SELECT MAX(refaccion_id)as last_refaccion FROM refaccion;");
                        $sl->execute();
                        $res = $sl->get_result();
                        while ($f = $res->fetch_assoc())
                            $lastId = $f['last_refaccion'];
                        //despues de saber el id, lo consultamos
                        move_uploaded_file($archivo,'imgRefacciones/' . $lastId . '.' . $extension);
                        $ruta = $ruta . "/" . $lastId . '.' .$extension;
                        //se sube la img con el nombre del id anexado
                        $sql = $con->prepare("UPDATE refaccion SET refaccion_imagen='" . $ruta . "' WHERE refaccion_id=?;");
                        $sql->bind_param('i', $lastId);
                        $sql->execute();
                        header("Location: alerta.php?tipo=exito&operacion=Refaccion guardada e imagen cargada&destino=refacciones_seleccionar_marca.php");
                    }else{
                        header("Location: alerta.php?tipo=fracaso&operacion=Formato de imagen no valido(!= JPG ó PNG)&destino=refacciones_seleccionar_marca.php");
                    }
                }else{
                    header("Location: alerta.php?tipo=exito&operacion=Refaccion guardada, no se anexo archivo&destino=refacciones_seleccionar_marca.php");
                    
                }
            }else{
                header("Location: alerta.php?tipo=fracaso&operacion=Refaccion no guardada&destino=refacciones_seleccionar_marca.php");
            }
        $ins->close();
        $con->close();
    
}
?>