<?php 

require_once '../../core/Interface.php';

/**
* 
*/
class Usuario {
	private $principal;
	private $login;

	public function __construct(){
		$this->principal = array(
			'empezar_reparaciones' => 'modules/reparaciones/',
			'excel_reparaciones' => 'modules/reparaciones/excel.php',
			'pdf_reparaciones' => 'modules/reparaciones/pdf.php',
			'empezar_instalaciones' => 'modules/instalaciones/',
			'excel_instalaciones' => 'modules/instalaciones/excel.php',
			'pdf_instalaciones' => 'modules/instalaciones/pdf.php'
		);
		$this->login = array('login_action' => 'core/initSession.php');

		$this->principal = addUrlToArrayValues($this->principal);
		$this->login = addUrlToArrayValues($this->login);
	}

	public function getPrincipal(){
		return $this->principal;
	}

	public function getLogin(){
		return $this->login;
	}
}

?>