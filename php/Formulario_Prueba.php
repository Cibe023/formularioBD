<?php

include_once '/basicophp/config.php';
include 'Encriptado2.php';
include '/basicophp/limpieza.php';
include '/basicophp/logger.php';
#name service api 
if( php_sapi_name() !=='apache2handler'){
die("no pudes abrirlo desde la consola ");
}

#apache2handler navegador
#cli consola 
$nombre = limpiarRegex($_POST['nombre']);
$Apellido = limpiarRegex($_POST['Apellido']);
$telefono = limpiarRegex($_POST['telefono']);
$colonia = limpiarRegex($_POST['colonia']);
$direccion = limpiarRegex($_POST['direccion']);
$servicio = limpiarRegex($_POST['servicio']);
$correo = limpiarRegex($_POST['correo']);
$fecha = limpiarRegex($_POST['fecha']);
$hora = limpiarRegex($_POST['hora']);
$motivo = limpiarRegex($_POST['motivo']);
/*$pwsd = encriptarString (limpiarRegex($_POST['pwsd']));*/



if (!$comn -> connect_error ){


    $sql= "INSERT INTO formulario (nombre ,apellido ,telefono,colonia ,direccion ,tipo_servicio ,correo ,fecha_citas , fecha_hoy, quien_atendio  )
    VALUES('$nombre','$Apellido','$telefono','$colonia','$direccion','$servicio','$correo','$fecha','$hora','$motivo')"; 

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