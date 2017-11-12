<?php 

require_once '../../core/session/checkSession.php';
require_once '../../core/Interface.php';

$usuarios_principal_view = new View('usuarios/principal', $filesReplace);
$usuarios_principal_view->addArrayToDictionary($usuariosPrincipal);
$usuarios_principal_view->addValueToDictionary('page_script','');

$usuarios_principal_view->printInterface();

?>