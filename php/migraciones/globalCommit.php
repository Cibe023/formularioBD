<?php

include_once 'commitUsuario.php';
include_once 'commitReporte.php';
include_once 'commitCategoria.php';
include_once 'commitProducto.php';
include_once 'commitComentario.php';
include_once 'commitFavorito.php';
include_once 'commitDirecciones.php';
include_once 'commitActividad.php';





if( php_sapi_name() !=='cli'){
    die("no pudes abrirlo desde la consola ");
}


usuariocommit();
reportecommit();
categoriascommit();
productocommit();
comentarioscommit();
favoritocommit();
direccioncommit();
Actividadcommit();
?>