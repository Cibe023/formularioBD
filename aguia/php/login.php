<?php
/*include 'texto_aleatorio.php';*/
include 'config.php';
include 'encriptado.php';
include 'limpieza.php';
include 'logger.php';

if( php_sapi_name() !=='apache2handler'){
  die("no pudes abrirlo desde la consola ");
  }

 if($comn -> connect_error ){
    echo "error en la conexion";

 }else{
  $correo=$_POST['correo'];
  $pwsd = encriptarString(limpiarRegex($_POST['pwsd']));



$sql="SELECT*FROM usuario WHERE correo='$correo' AND '$pwsd'";
logerReggister($comn, $sql);
$resultado= $comn -> query($sql);

if($resultado->num_rows >0){ 
  
   
    header("Location:../index.html");
    
}else{
  
  
  header("Location:../html/bienvenido.html");

 
}


 $comn->close();
 }
?>