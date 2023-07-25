<?php

function categoriascommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE categorias (
                categoria_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255)
                      
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function categoriasRollback(){
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
            $pdo -> exec("DROP TABLE categorias");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>