<?php

    if (isset($_POST['descripcion'])) {
        // Recuperar los datos del formulario
      
       
        $descripcion = $_POST['descripcion'];
    
      include 'config.php';
        // Verificar la conexión
        if ($comn->connect_error) {
            die("La conexión falló: " . $comn->connect_error);
        }
    
        // Preparar la consulta SQL para insertar el reporte en la tabla correspondiente
        $sql = "INSERT INTO reporte ( descripcion) 
        VALUES (  '$descripcion')";
    
        if ($comn->query($sql) === TRUE) {
            echo "El reporte se ha guardado correctamente en la base de datos.";
        } else {
            echo "Error al guardar el reporte: " . $comn->error;
        }
    
        // Cerrar la conexión a la base de datos
        $comn->close();
    } else {
        echo "No se han enviado los datos del formulario correctamente.";
    }
    ?>