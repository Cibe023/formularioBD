<?php

function comentarioscommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE comentarios (
                comentario_id INT PRIMARY KEY,
                comentario VARCHAR(255)
                   
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function comentariosRollback(){
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
            $pdo -> exec("DROP TABLE comentarios");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>