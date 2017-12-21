<?php 

require_once 'model.php';

$empresas = Tablas::getEmpresasTable();
$tecnicos = Tablas::getTecnicosTable();

$admin_principal_view = new View('administrador/principal', $filesReplace);
$admin_principal_view->addValueToDictionary('empresas', $empresas);
$admin_principal_view->addValueToDictionary('tecnicos', $tecnicos);
$admin_principal_view->printInterface();

?>