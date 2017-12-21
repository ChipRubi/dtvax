<?php

require_once 'model.php';

$empresa = Listas::getSelectEmpresa();
$fecha = Fechas::getTodayDateForMySQL();

$reparaciones_nuevo_view = new View('localizadores/nuevo', $filesReplace);
$reparaciones_nuevo_view->addArrayToDictionary($filesModules);
$reparaciones_nuevo_view->addValueToDictionary('FECHA', $fecha);
$reparaciones_nuevo_view->addValueToDictionary('SELECT_EMPRESA', $empresa);
$reparaciones_nuevo_view->printInterface();

?>