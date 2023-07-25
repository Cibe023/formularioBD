<?php

function reportecommit(){
    
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE reporte (
                reporte_id INT AUTO_INCREMENT PRIMARY KEY PRIMARY KEY,
                descripcion VARCHAR(255)
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function reporteRollback(){
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
            $pdo -> exec("DROP TABLE reporte");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>