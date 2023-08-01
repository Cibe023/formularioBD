<?php

function Actividadcommit(){
try{
    $pdo= new PDO(
        "mysql:host=localhost;dbname=proyecto","root","");
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            $pdo -> beginTransaction();
            $pdo -> exec("
            CREATE TABLE actividad (
               id_registro INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                usuario_id INT (10),
                registro TEXT,
                fecha TIMESTAMP CURRENT_TIMESTAMP()    
            )");
            
            $pdo ->commit();


    }catch(Exception $e){
        echo $e;

    }

}
function ActividadRollback(){
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
            $pdo -> exec("DROP TABLE actividad");
            
            $pdo ->commit();
    }catch(Exception $e){
        echo $e;

    }
}
?>