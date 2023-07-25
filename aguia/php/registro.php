<?php

include_once 'config.php';
include 'encriptado.php';
include 'limpieza.php';
include 'logger.php';
#name service api 
if( php_sapi_name() !=='apache2handler'){
die("no pudes abrirlo desde la consola ");
}

#apache2handler navegador
#cli consola 
$usuario = limpiarRegex($_POST['usuario']);
$nombre = limpiarRegex($_POST['nombre']);
$correo = limpiarRegex($_POST['correo']);
$pwsd = encriptarString (limpiarRegex($_POST['pwsd']));



if (!$comn -> connect_error ){


    $sql= "INSERT INTO usuario(usuario,nombre,correo,pwsd)
    VALUES('$usuario','$nombre','$correo','$pwsd')"; 

logerReggister($comn, $sql);
echo"contrasena y registrada";

    if ($comn ->query($sql)=== TRUE){
        header("location:../html/login.html");

    }else{
        header("location:../index.html");
    }
   
$comn -> close();
}
?>