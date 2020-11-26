<!– PARA EJEMPLO DASC — >

<?php
$id_marca_seleccionada = $_GET['marca_id'];
$nombre_marca_seleccionada = $_GET['marca_nombre'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php 
        include'inc/incluye_bootstrap.php';
        include 'inc/conexion.php'; 
        include 'inc/incluye_datatable_head.php';?>
        <link href="css/sweetalert.css" rel="stylesheet">
        <script src="js/sweetalert.min.js">
        </script>
        <!--termina código que incluye Bootstrap-->

    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php'; 
        include 'inc/conexion.php';
        include 'inc/incluye_datatable_head.php';?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
            <?php
            $sel = $con->prepare("SELECT *from proveedor");
            
            $sel->execute();
            $res = $sel->get_result();
            $row = mysqli_num_rows($res);
             
                ?>
                    

                <form role="form" id="login-form" method="post" class="form-signin" action="refacciones_guardar.php">
                    <div class="h2">
                        Cotizar con Proveedor
                    </div>

                    <div class="form-group">
                    Seleccione a un proveedor  <?php /*echo $row;*/
                    echo '</br>';
                            echo "<select id='proveedor' onchange='pass()'>";?>
                            
                        <?php while ($f = $res->fetch_assoc()) { 
                           
                           echo "<option value=".$f['proveedor_id'].">".$f['proveedor_nombre'].'>>>>'.$f['proveedor_id'].'</option>';
                           
                           
                        }
                        echo '</select>';
                        
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Fecha de solicitud de precios</label>
                        <input type="date" id="date" 
                        step="1" class="form-control" name="fecha_solicitud" value="<?php echo date("Y-m-d"); ?>"required>
                    </div>

                    <div class="form-group">
                        <label>Precio $ (requerido)</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" placeholder="Precio actual" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>
    </body>
</html>

