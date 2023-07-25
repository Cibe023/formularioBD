<?php
include_once 'commitFormulario.php';


if( php_sapi_name() !=='cli'){
    die("no pudes abrirlo desde la consola ");
}

formularioRollback();

?>