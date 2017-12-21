<?php 

require_once '../../core/checkSession.php';
require_once '../../core/Interface.php';
require_once '../../core/DBConnection.php';
require_once '../../core/PDFGenerate.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if ($datos['idTipo'] != 1) {
	header('Location: '.$GLOBALS['config']['base_url']);
}

/**
* 
*/
class Tablas {
	public static function getEmpresasTable(){
		$res = Empresa::getEmpresas();
		$cont = 1;
		$empresas = '';
		while ($dato = $res->fetch_assoc()) {
			$empresas = $empresas.'
			<tr>
				<td class="text-center">'.$cont.'</td>
				<td class="text-center">'.$dato['nombreEmpresa'].'</td>
				<td class="text-center"><a href="empresaeditar.php?id='.$dato['idEmpresa'].'">Editar</a></td>
			</tr>
			';
			$cont++;
		}
		return $empresas;
	}

	public static function getTecnicosTable(){
		$tecnicos = '';
		$res = Tecnico::getTecnicos();
		$cont = 1;
		while ($dato = $res->fetch_assoc()) {
			if ($dato['idTecnico'] != 1) {
				$tecnicos = $tecnicos.'
				<tr>
					<td>'.$cont.'</td>
					<td>'.$dato['nombreTecnico'].'</td>
					<td>'.$dato['apellidosTecnico'].'</td>
					<td class="text-center"><a href="tecnicoeditar.php?id='.$dato['idTecnico'].'">Editar</a></td>
				</tr>
				';
				$cont++;
			}
		}
		return $tecnicos;
	}
}

/**
* 
*/
class Empresa {
	private $nombre;

	function __construct($nombre){
		$this->nombre = $nombre;
	}

	// Getters and Setters

	// Funciones de alteraciones
	public function add(){
		$sql = 'INSERT INTO empresa (nombreEmpresa) VALUES ("'.$this->nombre.'");';
		$res = executeQuery($sql);
		return $res;
	}

	public function modify($id=''){
		$sql = "UPDATE empresa SET nombreEmpresa = '".$this->nombre."' WHERE idEmpresa = '".$id."';";

		$res = executeQuery($sql);
		return $res;
	}

	public static function getEmpresas(){
		$sql = '
		SELECT * 
		FROM empresa
		ORDER BY nombreEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getEmpresaNameById($id=''){
		$sql = '
		SELECT * 
		FROM empresa
		WHERE idEmpresa = '.$id.';';

		$res = executeQuery($sql);
		$dato = $res->fetch_assoc();
		return $dato['nombreEmpresa'];
	}
}


/**
* 
*/
class Tecnico
{
	private $nombre;
	private $apellidos;

	function __construct($nombre='', $apellidos=''){
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
	}

	// Getters and Setters

	// Funciones de alteraciones
	public function add(){
		$sql = '
		INSERT INTO tecnico (
			nombreTecnico, 
			apellidosTecnico
		) VALUES (
			"'.$this->nombre.'", 
			"'.$this->apellidos.'"
		);';

		$res = executeQuery($sql);
		return $res;
	}

	public function modify($id=''){
		$sql = "
		UPDATE tecnico 
		SET 
			nombreTecnico = '".$this->nombre."', 
			apellidosTecnico = '".$this->apellidos."' 
		WHERE idTecnico = '".$id."';";

		$res = executeQuery($sql);
		return $res;
	}

	public static function getTecnicos(){
		$sql = '
		SELECT * 
		FROM tecnico
		ORDER BY nombreTecnico;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getTecnicoNameById($id=''){
		$sql = '
		SELECT * 
		FROM tecnico
		WHERE idTecnico = '.$id.';';

		$res = executeQuery($sql);
		return $res->fetch_assoc();
	}
}
?>