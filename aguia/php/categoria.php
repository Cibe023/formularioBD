<?php
include 'config.php';
if( php_sapi_name() !=='apache2handler'){
    die("no pudes abrirlo desde la consola ");
    }
// Verificar la conexión
if ($comn->connect_error) {
    die("La conexión falló: " . $comn->connect_error);
}

// Verificar si se ha enviado una categoría
if (isset($_POST['categoria'])) {
    $categoriaSeleccionada = $_POST['categoria'];

    // Verificar si la categoría ya existe en la base de datos
    $sql = "SELECT * FROM categorias WHERE nombre =
     '$categoriaSeleccionada'";
    $result = $comn->query($sql);

    if ($result->num_rows > 0) {
        // La categoría ya existe
        echo "Has seleccionado la categoría existente: " 
        . $categoriaSeleccionada;
    } else {
        // La categoría no existe, insertarla en la base de datos
        $sqlInsert = "INSERT INTO categorias (nombre) VALUES ('$categoriaSeleccionada')";
        if ($comn->query($sqlInsert) === TRUE) {
            echo "Has seleccionado y creado la categoría: " . $categoriaSeleccionada;
        } else {
            echo "Error al crear la categoría: " . $comn->error;
        }
    }
} else {
    echo "No se ha seleccionado ninguna categoría.";
}

// Cerrar la conexión
$comn->close();
?>
