<?php
include 'inc/conexion.php';
$id_sucursal = "";
/*$idproveedor = $_GET['proveedor_id'];
$nomproveedor = $_GET['proveedor_nombre'];*/
$nomSuc = strtoupper($_POST['nomSuc']);
$dirSuc = strtoupper($_POST['dirSuc']);
$tel = $_POST['tel1'];
$tel1 = $_POST['tel2'];
$correo = $_POST['correo'];
$sql = $con->prepare("SELECT sucursal_id, proveedor_id, sucursal_nombre FROM sucursal where proveedor_id=2");
/*$sql->bind_param('is', $idproveedor, $nomproveedor);*/
$sql->execute();
$res = $sql->get_result();
$row = mysqli_num_rows($res);
if($row != 0){
    echo "YA SE HA AGREGADO ESTA SUCURSAL PARA EL PROVEEDOR ".$nomproveedor;
    echo "¿Desea agregar una nueva sucursal?";
    echo "<a href=\"sucursalAgregar.php?proveedor_id=".$idproveedor."&proveedor_nombre".$nomproveedor."\" class=\"btn btn-primary\" role=\"button\"> AGREGAR </a>";
    echo "<a href=\"index.php\" class=\"btn btn-default\" role=\"button\"> CANCELAR </a>";
}else{
    $ins = $con->prepare("INSERT INTO sucursal VALUES(?,?,?,?,?,?,?)");
    $ins->bind_param("iissiis",$id,$idproveedor,$nomSuc,$dirSuc,$tel,$tel1,$correo);
    if ($ins->execute()) {
        echo "Sucursal guardada";
        echo "Sucursal registrada";
    }else{
        echo "Error al insertar Sucursal";
    }
    $ins->close();
    $con->close();
}
?>