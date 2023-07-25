<?php
include 'config.php';
if( php_sapi_name() !=='apache2handler'){
    die("no pudes abrirlo desde la consola ");
    }
if ($comn->connect_error) {
    die("La conexión falló: " . $comn->connect_error);
}


if (isset($_POST['favorito'])) {
    $favorito = $_POST['favorito'];
    $usuarioId = 1; // Asigna el ID del usuario correspondiente

    
    $sql = "INSERT INTO favorito (favorito, usuario_id) VALUES ('$favorito', '$usuarioId')";
    
    if ($comn->query($sql) === TRUE) {
        echo "La selección de favorito se ha guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar la selección de favorito: " . $comn->error;
    }
} else {
    echo "No se ha enviado la selección de favorito correctamente.";
}

$comn->close();
?>







    
  