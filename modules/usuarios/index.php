<?php 

require_once '../../core/checkSession.php';
require_once 'model.php';

$usuario = new Usuario();
$usuarios_principal_view = new View('usuarios/principal', $filesReplace);
$usuarios_principal_view->addArrayToDictionary($usuario->getPrincipal());
$usuarios_principal_view->printInterface();

?>