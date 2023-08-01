<?php

function usuariocommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE usuario (
                usuario_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                usuario VARCHAR(15) NOT NULL,
                nombre VARCHAR(20) NOT NULL,
                correo VARCHAR(30) NOT NULL,
                pwsd TEXT NOT NULL UNIQUE,
                direccion_id INT,
                FOREIGN KEY (direccion_id) REFERENCES direccion(direccion_id)         
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function usuarioRollback(){
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