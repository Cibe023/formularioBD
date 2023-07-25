<?php
include 'config.php';
if( php_sapi_name() !=='apache2handler'){
    die("no pudes abrirlo desde la consola ");
    }
if ($comn->connect_error) {
    die("La conexión falló: " . $comn->connect_error);
}


$comentario =$_POST['comentario']; 
//$usuario_id =$_POST['comentario']; // llave foranea

$sql = "INSERT INTO comentarios (comentario ) VALUES 
('$comentario')";


if ($comn->query($sql) === TRUE) {
    echo "El comentario se ha insertado correctamente.";
} else {
    echo "Error al insertar el comentario: ";
}


$comn->close();
?>
