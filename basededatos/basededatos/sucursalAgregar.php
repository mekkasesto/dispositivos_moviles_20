
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php'; 
        include 'inc/conexion.php';
        include 'inc/incluye_datatable_head.php';
        
        
        ?>
        <!--termina código que incluye Bootstrap-->
        <link href="css/cotizacionesEstilos.css" rel="stylesheet" type="text/css" />        
    </head>
    <script type="text/javascript">
    function pass(){
        var x = document.getElementById("proveedor").value;
        document.getElementById("none").innerHTML = x;
    }
    document.getElementById("proveedor_id").innerHTML = x;
    </script>

    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container barra">
            <div class="jumbotron barra">
                <?php
            $sel = $con->prepare("SELECT *from proveedor");
            
            $sel->execute();
            $res = $sel->get_result();
            $row = mysqli_num_rows($res);
            echo '<div class="barra">'; 
                ?>
                <div class="h2">
                    Agregar Sucursal
                </div>
                <form role="form" id="login-form" method="post" class="form-signin" action="sucursales_guardar.php">
                    <div class="h4">
                    Seleccione a un proveedor   
                    </br>
                        <select name="proveedor_id">
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <option value="<?php echo $f['proveedor_id'] ?>">
                           <?php echo $f['proveedor_nombre'] ?>
                            </option>
                            <?php
                        }
                    $sel->close();
                    $con->close();?>
                        </select>
                        
                        
                        
                    </div>

                    <div class="form-group">
                        <label require>Nombre de la sucursal </label>
                        <input type="text" id="nomSuc" class="form-control" name="nomSuc" value="" placeholder="Nombre(requerido)">
                    </div>

                    <div id="none">
                        <input type="text" hidden>
                    </div>

                    <div class="form-group">
                        <label>Dirección de la sucursal</label>
                        <input type="text" class="form-control" id="dirSuc" name="dirSuc"
                               placeholder="Dirección de la sucursal" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono 1</label>
                        <input type="text" class="form-control" id="tel1" name="tel1"
                               placeholder="Tel" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group">
                        <label>Teléfono 2</label>
                        <input type="text" class="form-control" id="tel2" name="tel2"
                               placeholder="Tel" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group">
                        <label>Correo electronico</label>
                        <input type="text" class="form-control" id="correo" name="correo"
                               placeholder="ejem@gmail.com" style="text-transform:uppercase;">
                    </div>
                    
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" 
                    value="Limpiar">
                    
                </form>
            </div>
            </div>
        </div>
    </body>
</html>