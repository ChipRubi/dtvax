<?php 
require_once 'Constants.php';
require_once 'DBConnection.php';

/**
* Clase que gestiona el logeo de usuarios
*/
class Session {
	
	function __construct(){
		session_start();
	}

	public function init($user='', $pass=''){
		$sql = '
		SELECT * 
		FROM usuario
		WHERE usuario = "'.$user.'" AND password = md5("'.$pass.'");';
		$res = executeQuery($sql);
		if ($dato = $res->fetch_assoc()) {
			$_SESSION['sessionId'] = $dato['idUsuario'];
		}
		$this->checkForIndex();
	}

	public function close(){
		session_destroy();
		$this->checkForIndex();
	}

	public function check(){
		if (!isset($_SESSION['sessionId'])) {
			header('Location: '.$GLOBALS['config']['base_url']);
		}
	}

	public function checkForIndex(){
		if (!isset($_SESSION['sessionId'])) {
			header('Location: '.$GLOBALS['config']['base_url'].'modules/usuarios/login.php');
		} else {
			header('Location: '.$GLOBALS['config']['base_url'].'modules/usuarios/');
		}
	}
}

?>