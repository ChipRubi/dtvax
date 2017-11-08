<?php 
// Agregar los archivos utilizados
include_once 'core/Constants.php';
require_once 'core/Interface.php';

// Obtener el codigo de las vistas
$body = file_get_contents('assets/pages/principal.html');
$header = file_get_contents('assets/temp/header.html');
$footer = file_get_contents('assets/temp/footer.html');

// Crear la interfaz
$principal = new View($header, $body, $footer, $constPrincipal);
$principal->replace();
$principal->printInterface();

?>