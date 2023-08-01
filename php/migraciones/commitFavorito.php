<?php

function favoritocommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE favorito (
                favorito_id INT AUTO_INCREMENT PRIMARY KEY,
                usuario_id INT,
                FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function favoritoRollback(){
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
            $pdo -> exec("DROP TABLE favorito");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>