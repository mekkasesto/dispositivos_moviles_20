<?php
include 'inc/conexion.php';
$id_sucursal = "";

if($_SERVER['REQUEST_METHOD']== 'POST'){
$idproveedor = intval($_POST['proveedor_id']);
//$nomproveedor = $_POST['proveedor_nombre'];
$nomSuc = strtoupper($_POST['nomSuc']);
$dirSuc = strtoupper($_POST['dirSuc']);
$tel = strtoupper($_POST['tel1']);
$tel1 = strtoupper($_POST['tel2']);
$correo = strtoupper($_POST['correo']);
$sql = $con->prepare("INSERT INTO sucursal_prov VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("iisssss",$id,$idproveedor,$nomSuc,$dirSuc,$tel,$tel1,$correo);
//$sql = 'INSERT INTO sucursal VALUES'
if($sql->execute()){
    header("Location: alerta.php?tipo=exito&operacion=Sucursa guardada&destino=sucursalAgregar.php");

}else{
    header("Location: alerta.php?tipo=fracaso&operacion=Sucursal no guardada&destino=sucursalAgregar.php");
}
    $ins->close();
    $con->close();

}
?>