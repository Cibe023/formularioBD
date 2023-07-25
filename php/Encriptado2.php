<?php

include '/basicophp/config.php';
/* SHA256, MD5 --> UNIDIRECCIONAL
    AES-256-CBC --> BIDIRECCONAL 
    AES-256 || CBC --> ( BLOQUE DE CADENAS )
    encriptadas || cipher lock chaining
    todas las columnas a tipo texto
*/

function encriptarTexto($texto, $key, $iv){
    //iteracion vectorial

    $cipher ="AES-256-CBC";
    $opciones = OPENSSL_RAW_DATA;
    //01010  1010 1010 01001 01010  1010 0101
    $encriptado = openssl_encrypt($texto, $key, $iv,$cipher,$opciones);
    return base64_encode($encriptado);
    # encriptado -> bits
     # return -> bytes
      # bytes -> legibles para nosotros 
}

function desincriptarTexto($textoEncriptado, $key, $iv){
    $cipher ="AES-256-CBC";
    $opciones = OPENSSL_RAW_DATA;
   
    $desencriptado = openssl_decrypt(base64_decode($textoEncriptado),
    $cipher,
    $key,
    $iv,
    $opciones
    );
    return $decrypt;
    # encriptado -> bits
     # return -> bytes
      # bytes -> legibles para nosotros 
}
$key= "qwertyuiopasdfghjklzxcvbnmmnbv"; //TEXTO SECRETO DE 32 CARACTERES
$iv="16 caracteresalea";
$midato = "hola mundo";    
/// -> $_POST ['VARABLE']
$midatoEncriptado = encriptarTexto($midato, $key, $iv);
$desencripatarTexto( $midato, $key, $iv   );
echo $midatoEncriptado;
echo $desencripatarTexto;
?>