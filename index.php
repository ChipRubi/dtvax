<?php 

include 'core/Constants.php';
include 'core/Interface.php';

$body = file_get_contents('assets/pages/principal.html');
$header = file_get_contents('assets/temp/header.html');
$footer = file_get_contents('assets/temp/footer.html');

$principal = new View($header, $body, $footer, $constPrincipal);
$principal->replace();
$principal->printInterface();

?>