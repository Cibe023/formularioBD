<?php

function formulariocommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE formulario (
                form_id INT AUTO_INCREMENT PRIMARY KEY,
                nombre TEXT NOT NULL,
                apellido TEXT NULL,
                telefono TEXT NOT NULL,
                colonia TEXT NOT NULL,
                direccion TEXT NOT NULL,
                tipo_servicio TEXT NOT NULL,
                correo TEXT NOT NULL,
                fecha_citas DATE NOT NULL,
                fecha_hoy DATE NOT NULL,
                quien_atendio VARCHAR(50) NOT NULL
                 
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function formularioRollback(){
   # desase cambios del commit 
   try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            #executar = exec
            #luego haremos un exec de todas las tablas 
            $pdo -> exec("DROP TABLE usuario");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>