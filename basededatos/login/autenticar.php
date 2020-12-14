<?php

include("../configuracion.php");

 
$user = $_POST["name"];
$user = addslashes($user);
$user = strip_tags($user);
$pass = $_POST["pass"];
$pass = addslashes($pass);
$pass = strip_tags($pass);


echo $nombre;
echo $pass;

//conexion a la base de datos

$ip = $_SERVER['REMOTE_ADDR'];

if ($user == "adm" && $pass == "adm") {
            /*Variable de sesión*/
    session_start();
    $_SESSION['nivel']="1"; 
    $_SESSION['name'] = $user;
    define("inicio","../basededatos/index.php");
    header("location:".inicio); 

}
elseif($user == "hola" && $pass == "hola"){
        /*Variable de sesión*/
        session_start();
        $_SESSION['nivel']="2";
        $_SESSION['name']= $user; 
        define("inicio","../basededatos/index.php");
        header("location:".inicio); 
    
}

else{
    define("inicio","../index.php?msj=msjError");
    header("location:" .inicio);
}


?>