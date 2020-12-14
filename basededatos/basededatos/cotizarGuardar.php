<?php
session_start();
$nombre_cliente;
if (!isset($_SESSION['nombre_cliente']) && !isset($_SESSION['descripcion_coche']) && !isset($_SESSION['fecha_actual'])) {
    header('Location: cotizacion_inicia.php');
} else {
    $refaccion_proveedor_id_seleccionado = $_POST['refaccion_proveedor_id_seleccionado'];
    $incremento_precio = $_POST['incremento_precio'];
    $numero_piezas = $_POST['numero_piezas'];
    $mano_obra = $_POST['mano_obra'];

    include 'inc/conexion.php';
    $cotizacion_id_temporal=0;
    
    ////////////////////////////////////
    $ins=$con->prepare("INSERT INTO cotizacion_detalle_temporal VALUES(?,?,?,?,?,?)");
    $ins->bind_param("iiidid",$id,$cotizacion_id_temporal,$refaccion_proveedor_id_seleccionado,$incremento_precio,$numero_piezas,$mano_obra );
    if($ins->execute()){
        header("Location: alerta.php?tipo=exito&operacion=Refaccion agregada a la cotización actual&destino=cotizacion_en_curso.php");
    }
    else{
        header("Location: alerta.php?tipo=fracaso&operacion=Refaccion no agragada a la cotización n=cotizacion_en_curso.php");
    }
    $ins->close();
    $con->close();
    /////////////////////////////////////

}