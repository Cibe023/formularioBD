<?php
// Verificar si se han enviado los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_FILES['imagen'])) {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    
    // Configuración de la carpeta de destino para guardar las imágenes
    $carpetaDestino = "../img/img";

    // Obtener el nombre y la ruta temporal del archivo de imagen
    $nombreImagen = $_FILES['imagen']['name'];
    $rutaImagenTemporal = $_FILES['imagen']['tmp_name'];

    // Generar un nombre único para la imagen
    $nombreImagenUnico = uniqid() . '_' . $nombreImagen;

    // Mover la imagen a la carpeta de destino
    $rutaImagenDestino = $carpetaDestino . $nombreImagenUnico;
    move_uploaded_file($rutaImagenTemporal, $rutaImagenDestino);

    // Configuración de la conexión a la base de datos
    include 'config.php';


    // Verificar la conexión
    if ($comn->connect_error) {
        die("La conexión falló: " . $comn->connect_error);
    }

    // Preparar la consulta SQL para insertar el producto en la tabla correspondiente
    $sql = "INSERT INTO producto (nombre, descripcion, imagen)
     VALUES ('$nombre', '$descripcion', '$rutaImagenDestino')";

    if ($comn->query($sql) === TRUE) {
        echo "El producto se ha publicado correctamente.";
    } else {
        echo "Error al publicar el producto: " . $comn->error;
    }

    // Cerrar la conexión a la base de datos
    $comn->close();
} else {
    echo "No se han enviado los datos del formulario correctamente.";
}
?>