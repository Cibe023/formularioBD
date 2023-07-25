<?php
#encriptar
function encriptarString($inputString){
    $tmp = hash('sha256',$inputString);
    return $tmp;
}
?>