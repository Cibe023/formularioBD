<?php

function direccioncommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE direccion (
                direccion_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                direccion varchar (50),
                calle VARCHAR(50),
                ciudad VARCHAR(30),
                estado VARCHAR(30),
                telefono VARCHAR(10),
                pais VARCHAR(20)         
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function direccionRollback(){
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
            $pdo -> exec("DROP TABLE direccion");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>