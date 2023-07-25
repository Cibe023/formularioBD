<?php 
# asi se manda llamar una extencion 

function asd($comn, $sql){
    
for ($i=0; $i<2; $i++ ){
    //code
    $nombre  = "holamundo";
    $nombre  =$nombre. uniqid().mt_rand();

    $sql = "INSERT INTO usuario( usuario,nombre,correo,pwsd) VALUES
    ('$nombre','$nombre','$nombre', '$nombre')";

if($comn -> query($sql) === true){
}
}
}


?>