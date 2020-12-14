<?php
include 'inc/conexion.php';
$done = "Se ha registrado el proveedor correctamente";
$nodone = "Error al registrar al proveedor";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_del_proveedor_post = strtoupper($_POST['nombre_del_proveedor']);
    $direccion_del_proveedor_post = strtoupper($_POST['direccion_del_proveedor']);
    $telefono_1_post = strtoupper($_POST['telefono_1']);
    $telefono_2_post = strtoupper($_POST['telefono_2']);
    $correo_proveedor_post = strtoupper($_POST['correo_proveedor']);
    $id_proveedor='';
    $ins=$con->prepare("INSERT INTO proveedor VALUES(?,?,?,?,?,?)");
    $ins->bind_param("isssss",$id,$nombre_del_proveedor_post,$direccion_del_proveedor_post,$telefono_1_post,$telefono_2_post,$correo_proveedor_post);
    if($ins->execute()){
    	header("Location: alerta.php?tipo=exito&operacion=Proveedor guardado&destino=registrarProveedor.php");
    	
        
    }
    else{
    	header("Location: alerta.php?tipo=fracaso&operacion=Proveedor no guardado&destino=registrarProveedor.php");
    	

        
    }
    /*sleep(7);
    header('Location:index.php');*/
    $ins->close();
    $con->close();
    /*header('Location:index.php');
    /*$nombre_del_proveedor_post = strtoupper($_POST['nombre_del_proveedor']);
    $direccion_del_proveedor_post = strtoupper($_POST['direccion_del_proveedor']);
    $telefono_1_post = strtoupper($_POST['telefono_1']);
    $telefono_2_post = strtoupper($_POST['telefono_2']);
    $correo_proveedor_post = strtoupper($_POST['correo_proveedor']);
    
    $ins=$con->query("INSERT INTO proveedor VALUES(NULL,'$nombre_del_proveedor_post','$direccion_del_proveedor_post','$telefono_1_post','$telefono_2_post','$correo_proveedor_post')");
    if($ins){
        echo "Proveedor Registrado";
    }
    else{
        echo "NO SE HA EFECTUADO EL REGISTRO";
    }
    $con->close();*/
}
?>
