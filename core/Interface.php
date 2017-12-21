<?php 

require_once 'Constants.php';
require_once 'DBConnection.php';

/**
* Clase que permite reutilizar codigo
*/
class View {

	// Propierties
	private $header;
	private $menu;
	private $body;
	private $footer;
	private $dictionary;

	public function __construct($page='', $dictionary){
		$this->header = file_get_contents($GLOBALS['filesRoutes']['temp'].'header.html');
		$this->menu = file_get_contents($GLOBALS['filesRoutes']['temp'].'menu.html');
		$this->footer = file_get_contents($GLOBALS['filesRoutes']['temp'].'footer.html');
		$this->body = file_get_contents($GLOBALS['filesRoutes']['pages'].$page.'.html');
		$this->dictionary = $dictionary;
		$this->addScriptToDictionary();
		$this->addUserValuesToDictionary();
	}

	// Getters
	public function getHeader(){
		return $this->header;
	}
	public function getMenu(){
		return $this->menu;
	}
	public function getBody(){
		return $this->body;
	}
	public function getFooter(){
		return $this->footer;
	}
	public function getDictionary(){
		return $this->dictionary;
	}

	// Setters
	public function setHeader($header){
		$this->header = $header;
	}
	public function setMenu($menu){
		$this->menu = $menu;
	}
	public function setBody($body){
		$this->body = $body;
	}
	public function setFooter($footer){
		$this->footer = $footer;
	}
	public function setDictionary($dictionary){
		$this->dictionary = $dictionary;
	}

	// Methods
	public function replace(){
		foreach ($this->dictionary as $key => $value) {
			$this->header = str_replace('['.strtoupper($key).']', $value, $this->header);
			$this->menu = str_replace('['.strtoupper($key).']', $value, $this->menu);
			$this->body = str_replace('['.strtoupper($key).']', $value, $this->body);
			$this->footer = str_replace('['.strtoupper($key).']', $value, $this->footer);
		}
	}

	public function addValueToDictionary($key, $value){
		$this->dictionary[$key] = $value;
	}

	public function addArrayToDictionary($vArray){
		foreach ($vArray as $key => $value) {
			$this->dictionary[$key] = $value;
		}
	}

	public function addScriptToDictionary($script=''){
		if ($script == '') {
			$this->dictionary['page_script'] = '';
		} else {
			$this->dictionary['page_script'] = '<script src="'.$GLOBALS['filesRoutes']['js'].$script.'.js"></script>';
		}
	}

	public function addUserValuesToDictionary(){
		if (isset($_SESSION['sessionId'])) {
			$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);

			$this->dictionary['user_name'] = strtoupper($datos['usuario']);
			$this->dictionary['administrador'] = '';
			$this->dictionary['localizadores'] = '';
			
			if ($datos['idTipo'] == 1) {
				$this->dictionary['administrador'] = '<li><a href="'.$GLOBALS['filesRoutes']['mod'].'administrador"><span class="fas fa-cog"></span> Administrador</a></li>';
			} 
			if ($datos['idTipo'] == 1 || $datos['idTipo'] == 2) {
				$this->dictionary['localizadores'] = '<li><a href="'.$GLOBALS['filesRoutes']['mod'].'localizadores"><span class="fas fa-wifi"></span> Localizadores</a></li>';
			}
		}
	}

	public function printInterface(){
		$this->replace();
		print($this->header);
		print($this->menu);
		print($this->body);
		print($this->footer);
	}
}

/**
* Clase que engloba los metodos generales
*/
class GeneralQuerys {
	public static function getEmpresas(){
		$sql = '
		SELECT * 
		FROM empresa
		ORDER BY nombreEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getEmpresaById($idEmpresa=''){
		$sql = 'SELECT * FROM empresa WHERE idEmpresa = "'.$idEmpresa.'";';
		$res = executeQuery($sql);
		$registro = $res->fetch_assoc();
		return $registro['nombreEmpresa'];
	}

	public static function getTecnicos(){
		$sql = '
		SELECT * 
		FROM tecnico
		ORDER BY nombreTecnico;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getTecnicosById($idTecnico=''){
		$sql = 'SELECT * FROM tecnico WHERE idTecnico = "'.$idTecnico.'";';
		$res = executeQuery($sql);
		$registro = $res->fetch_assoc();
		return $registro['nombreTecnico'].' '.$registro['apellidosTecnico'];
	}

	public static function getUserDataById($id=''){
		$sql = '
		SELECT * 
		FROM usuario
		NATURAL JOIN usuario_tipo
		WHERE idUsuario = "'.$id.'";';
		$res = executeQuery($sql);
		return $res->fetch_assoc();
	}
}


/**
* Clase que regresa las listas desplegables
*/
class Listas {
	public static function getSelectEmpresa(){
		$res = GeneralQuerys::getEmpresas();
		$select = '';
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				$select = $select.'
				<option value="'.$registro['idEmpresa'].'">'.$registro['nombreEmpresa'].'</option>';
			}
		}
		return $select;
	}

	public static function getSelectTecnico(){
		$res = GeneralQuerys::getTecnicos();
		$select = '';
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				$select = $select.'
				<option value="'.$registro['idTecnico'].'">'.$registro['nombreTecnico'].' '.$registro['apellidosTecnico'].'</option>';
			}
		}
		return $select;
	}

	public static function getSelectEmpresaById($id=''){
		$select = '';

		$res = GeneralQuerys::getEmpresas();
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				if ($registro['idEmpresa'] == $id) {
					$select = $select.'
					<option value="'.$registro['idEmpresa'].'">'.$registro['nombreEmpresa'].'</option>';
				}
			}
		}

		$res = GeneralQuerys::getEmpresas();
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				if ($registro['idEmpresa'] != $id) {
					$select = $select.'
					<option value="'.$registro['idEmpresa'].'">'.$registro['nombreEmpresa'].'</option>';
				}
			}
		}

		return $select;
	}

	public static function getSelectTecnicoById($id=''){
		$select = '';

		$res = GeneralQuerys::getTecnicos();
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				if ($registro['idTecnico'] == $id) {
					$select = $select.'
					<option value="'.$registro['idTecnico'].'">'.$registro['nombreTecnico'].' '.$registro['apellidosTecnico'].'</option>';
				}
			}
		}

		$res = GeneralQuerys::getTecnicos();
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				if ($registro['idTecnico'] != $id) {
					$select = $select.'
					<option value="'.$registro['idTecnico'].'">'.$registro['nombreTecnico'].' '.$registro['apellidosTecnico'].'</option>';
				}
			}
		}

		return $select;
	}
}

/**
* Clase que gestiona las fechas
*/
class Fechas {
	public static function dateFromMySQLToNormal($fecha=''){
		$valores = explode('-', $fecha);
		return $valores[2].'-'.$valores[1].'-'.$valores[0];
	}

	public static function getTodayDateForMySQL(){
		date_default_timezone_set('America/Mexico_City');
		return date("Y-m-d");
	}

	public static function getTodayDate(){
		date_default_timezone_set('America/Mexico_City');
		$date = date("Y-m-d");
		$fecha = Fechas::dateFromMySQLToNormal($date);
		return $fecha;
	}

	public static function getTodayYear(){
		date_default_timezone_set('America/Mexico_City');
		return date("Y");
	}

	public static function getTodayMonth(){
		date_default_timezone_set('America/Mexico_City');
		return date("Y-m");
	}

	public static function getTodayDay(){
		date_default_timezone_set('America/Mexico_City');
		return date("Y-m-d");
	}
}


?>