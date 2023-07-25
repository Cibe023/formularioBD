<?php

function productocommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE producto (
                producto_id INT AUTO_INCREMENT PRIMARY KEY,              
                nombre VARCHAR(255),
                descripcion VARCHAR(255),
                imagen BLOB,
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function productoRollback(){
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
            $pdo -> exec("DROP TABLE producto");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>