<?php 
require_once 'LoginUsuarios.php';

if (isset($_POST['user']) and isset($_POST['pass'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sesion = new Session();
	$sesion->init($user, $pass);
}

?>