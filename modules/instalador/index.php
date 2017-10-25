<?php

include '../../core/Constants.php';
include '../../core/Interface.php';

$body = file_get_contents('../../assets/pages/instalador/principal.html');
$menu = file_get_contents('../../assets/temp/menu.html');
$header = file_get_contents('../../assets/temp/header.html');
$footer = file_get_contents('../../assets/temp/footer.html');

$date = getdate();
$fecha = $date['mday'].'-'.$date['mon'].'-'.$date['year'];

$principal = new View($header, $menu, $body, $footer, $constModules);
$principal->addArrayToDictionary($constInstalador);
$principal->addValueToDictionary('FECHA', $fecha);
$principal->replace();
$principal->printInterface();

?>