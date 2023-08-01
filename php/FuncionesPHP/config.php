<?php

function perseEnvFile($path){
    $contenido = file_get_contents($path);
//ver lineas=[]
    $lineas = explode( "\n", $contenido);
//[  ""]
    $envdata=[];
    foreach($lineas as $lineas){
    //code
    $lineas = trim($lineas);
    if (empty($lineas) || strpos($lineas, "#") === 0){
        continue;
    }
    //DB-NAME= Nombre
    list($key, $value) = explode("=", $lineas, 2);
    $envdata[$key] = trim($value);
}
//["usuario :nombre" ," pass: contracena..."]
    return $envdata;  
  // clave "valor":, clave2 "valor2":,
}


//$datosdeENV=leerENV(__DIR__ . '/../../.env');
//echo $datosdeENV['passE'];


$misVariables = perseEnvFile(__DIR__ . '/../../.env');
echo $misVariables[ 'nombreserver'];
echo $misVariables[ 'nombrebd'];
echo $misVariables[ 'usuarioEscribir'];
echo $misVariables[ 'passE'];
echo $misVariables[ 'usuarioLeer'];
echo $misVariables[ 'passL'];



// aqi comienza parte de como se dividiria los usuarios


//$comn = new mysqli($nombreserver,$usuariobd,$pass,$nombrebd);


function userescritura(){
//creencial escritura 
$misVariables = perseEnvFile(__DIR__ . '/../../.env');
$comn = new mysqli($misVariables[ 'nombreserver'],
                    $misVariables[ 'usuarioEscribir'],
                    $misVariables[ 'passE'],
                    $misVariables[ 'nombrebd']
                  );


if ($comn-> connect_error){ 
    die("error de conexion: " .$comn-> connect_error );

}
 return $comn;
}

function userelectura(){
//creencial escritura 
$misVariables = perseEnvFile(__DIR__ . '/../../.env');
$comn = new mysqli($misVariables[ 'nombreserver'],
                    $misVariables[ 'usuarioLeer'],
                    $misVariables[ 'passL'],
                    $misVariables[ 'nombrebd']
                  );


if ($comn-> connect_error){ 
    die("error de conexion: " .$comn-> connect_error );

}
 return $comn;
}
////////////////////////////////////////////////////// mas soluciones 
 // try- cach
 // try intenta ejectrar algo

 //try {
        // insert
 //} catch{exception $e}{
    // ninguna credencial es valida
 //  }
    

?>