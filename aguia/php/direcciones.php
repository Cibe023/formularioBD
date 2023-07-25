<?php
if( php_sapi_name() !=='apache2handler'){
    die("no pudes abrirlo desde la consola ");
    }

// Verificar si se han enviado los datos del formulario
if (isset($_POST['direccion']) && isset($_POST['calle'])
 && isset($_POST['ciudad']) && isset($_POST['estado'])
  && isset($_POST['telefono']) && isset($_POST['pais'])
  ) {
    // Recuperar los datos del formulario
    $direccion = $_POST['direccion'];
    $calle = $_POST['calle'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $telefono = $_POST['telefono'];
    $pais = $_POST['pais'];
   
    $regex="/[!^a-zA-Z-@._-]/";

    $telefono=preg_replace($regex,"",$telefono);

    include 'config.php';
    // Verificar la conexión
    if ($comn->connect_error) {
        die("La conexión falló: " . $comn->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO direccion  (direccion, calle, ciudad, estado, telefono,
     pais) 
    VALUES ('$direccion', '$calle', '$ciudad', '$estado', '$telefono', '$pais')";

    if ($comn->query($sql) === TRUE) {
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar los datos: " . $comn->error;
    }

    // Cerrar la conexión a la base de datos
    $comn->close();
} else {
    echo "No se han enviado los datos del formulario correctamente.";
}
?>