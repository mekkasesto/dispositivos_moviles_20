<?php
include 'inc/conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$refaccionId = $_POST['refaccionId'];
$proveedorId = $_POST['proveedorId'];
$fecha =$_POST['fecha_solicitud'];
$precio = $_POST['precio'];
$sql = $con->prepare("INSERT INTO refaccion_proveedor VALUES (?,?,?,?,?)");
$sql->bind_param("iiisi",$id,$refaccionId,$proveedorId,$fecha,$precio);
if($sql->execute()){
    header("Location:alerta.php?tipo=exito&operacion=CotizacionIncluida&destino=verRefacciones.php");
}else{
    header("Location: alerta.php?tipo=fracaso&operacion=Cotizacionnoguardada&destino=verRefacciones.php");
}
$sql->close();
$con->close();
}else{
    print("ERROR");
}

?>