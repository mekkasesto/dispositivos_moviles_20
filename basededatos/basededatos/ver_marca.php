<!DOCTYPE html>
<html>
    <head>
        <title>Data/Base</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        include'inc/incluye_bootstrap.php';
        include 'inc/conexion.php';
        include 'inc/incluye_datatable_head.php';
        ?>
        <link href="css/cotizacionesEstilos.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="container">
            <div class="jumbotron">
                <?php
                //Consulta sin parámetros
                $sel = $con->prepare("SELECT *from marca");

                /* consulta con parametros
                  $sel = $con->prepare("SELECT *from marca WHERE marca_id<=?");
                  $parametro = 50;
                  $sel->bind_param('i', $parametro);
                  finaliza consulta con parámetros */

                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                echo '<div class="barra">'; 
                ?>
                Elementos en tabla: <?php echo $row;
                            echo '<select>';?>
                        <?php while ($f = $res->fetch_assoc()) { 
                           
                           echo '<option value="'.$f['marca_id'].'">'.$f['marca_nombre'].'>>>>'.$f['marca_id'].'</option>';
                           
                        }
                        echo '</select>';
                        
                        echo '</div>';
                        $sel->close();
                        $con->close();
                        
                        ?>
                   
            </div>
        </div>
        <?php
        include 'inc/incluye_datatable_pie.php';
        ?>
    </body>
</html>

