<?php 

require_once 'model.php';

$usuario = new Usuario();
$usuarios_login_view = new View('usuarios/login', $filesReplace);
$usuarios_login_view->setMenu('');
$usuarios_login_view->addArrayToDictionary($usuario->getLogin());
$usuarios_login_view->printInterface();

?>