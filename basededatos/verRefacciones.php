<!DOCTYPE html>
<html>
    <head>
        <title>Seleeccionar refaccion</title>
        <meta charset="utf-8">
        <meta name="vieport" content="width=device-width,initial-scale=1.0">
        <?php 
        include'inc/incluye_bootstrap.php';
        include'inc/conexion.php';
        include'inc/incluye_datatable_head.php';
        ?>
    </head>
    <body>
        <?php include'inc/incluye_menu.php'?>
        <div class="container">
            <div class="jumbotron">
                <?php  
                $sql = $con->prepare("SELECT * FROM refaccion");
                $sql->execute();
                $resultado = $sql->get_result();
                ?>
                <div class="h2">
                    Seleccionar refaccion
                </div>
                <div class="h3">
                    seleccione una refaccion para su administración
                </div>
                <div class="h4">
                    seleeciona la refaacción
                </div>
                <table id="example" class="table table-striped table-bordered" cellspading="0" width="100%">
                    <thead>
                        <th>ID REFACCION</th>
                        <th>MARCA</th>
                        <th>DESCRIPCION</th>
                        <th>NOMBRE </th>
                    </thead>
                    <tbody>
                        <?php while ($f = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $f['refaccion_id']?>
                                </td>
                                <td>
                                    <?php echo $f['marca_id']?>
                                </td>
                                <td>
                                    <?php echo $f['refaccion_descripcion']?>
                                </td>
                                <td>
                                    <a href="cotizarProveedor.php?refaccion_id=<?php echo $f['refaccion_id']?>&refaccion_nombre=<?php echo $f['refaccion_nombre'] ?>"><?php echo $f['refaccion_nombre']?></a>
                                </td>
                            </tr>
                            <?php
                        }
                        $sql->close();
                        $con->close();
                        ?>
                    </tbody>
                    <tfoot>
                        <th>ID REFACCION</th>
                        <th>DESCRIPCION</th>
                        <th>MARCA</th>
                        <th>Nombre</th>     
                    </tfoot>
                </table>
            </div>
        </div>
        <?php include 'inc/incluye_datatable_pie.php'?>
                    
                    


    </body>


</html>