<?php
$error = "";
if (isset($_GET["msj"])&& ($_GET["msj"] == "msjError")) {
    $error = "usuario o contaseña incorrectos";
}
if (isset($_GET["msj"])&& ($_GET["msj"] == "gracias")) {
    $error = "enhorabuena vuelve pronto";
}
if (isset($_GET["msj"])&& ($_GET["msj"] == "id-denegado")) {
    $error = "favor de iniciar sesión";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="FormularioUsuarios" content="Usuarios">

    <title>InicioIntranet</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="intranet.js"> </script>


</head>
<body>

<div id="toHome">
    <form action="login/autenticar.php" method="POST" onsubmit="return validacion()"
    id="inicio" name="inicio">
        <label for="mail" class="mail">Usuario</label>
        <input type="text" name="name" id="name"/>

        <label for="pass" class="pass">Contraseña</label>
        <input type="password" name="pass" id="pass"/>
        <br class="clearfloat"/>
       
        <input type="submit" value="entrar" class="bInicio" id="bInicio"/>
        <p class="red"><?php echo $error ?></p>
    </form>
    
</div>
    
</body>
</html>