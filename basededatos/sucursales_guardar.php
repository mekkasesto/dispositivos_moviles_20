<?php
include 'inc/conexion.php';
$id_sucursal = "";

if($_SERVER['REQUEST_METHOD']== 'POST'){
$idproveedor = $_POST['proveedor_id'];
$nomproveedor = $_POST['proveedor_nombre'];
$nomSuc = strtoupper($_POST['nomSuc']);
$dirSuc = strtoupper($_POST['dirSuc']);
$tel = $_POST['tel1'];
$tel1 = $_POST['tel2'];
$correo = $_POST['correo'];
$sql = $con->prepare("INSERT INTO sucursal VALUES(?,?,?,?,?,?,?)");
$sql->bind_param('iisssss', $id, $idproveedor, $nomSuc,$dirSuc,$tel,$tel1,$correo);
$sql->execute();
if($sql->execute()){
    header("Location: alerta.php?tipo=exito&operacion=Sucursa guardada&destino=sucursalAgregar.php");

}else{
    header("Location: alerta.php?tipo=fracaso&operacion=Sucursa no guardada&destino=sucursalAgregar.php");
}
    $ins->close();
    $con->close();

}
?>