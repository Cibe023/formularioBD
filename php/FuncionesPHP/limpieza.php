<?php
function limpiarRegex($inputString){
    $regex = "/[^a-zA-Z0-9@._]/";
    $tmp = preg_replace($regex, "", $inputString);
    return $tmp;
}

?>