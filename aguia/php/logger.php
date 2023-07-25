<?php
function logerReggister($comn, $sql){
    #variable del evento texto plano 
    $Evento= "Evento:" . $comn ->
    real_escape_string($sql);
    #crear consulta en SQL Para el registro

    $sql1 ="INSERT INTO actividad(registro) VALUES ('$Evento')";
# guardar registro
if ($comn ->query($sql1)===TRUE) {

 }   
}
?>