<?php 

require_once '../../core/Interface.php';

$usuarios_login_view = new View('usuarios/login', $filesReplace);
$usuarios_login_view->setMenu('');
$usuarios_login_view->addArrayToDictionary($usuariosLogin);
$usuarios_login_view->addValueToDictionary('page_script','');

$usuarios_login_view->printInterface();

?>