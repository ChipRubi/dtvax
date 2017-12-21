<?php 
require_once '../../core/checkSession.php';
require_once '../../core/Interface.php';
require_once '../../core/PDFGenerate.php';
require_once '../../core/ExcelGenerate.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if ($datos['idTipo'] != 1 && $datos['idTipo'] != 2) {
	header('Location: '.$GLOBALS['config']['base_url']);
}


/**
* Clase de localizadores
*/
class Localizador {

	private $fecha;
	private $unidad;
	private $placas;
	private $imei;
	private $recarga;
	private $usuario;
	private $password;

	private $idEmpresa;
	private $idPruebas;
	private $datos;
	private $gps;

	// Constructor
	public function __construct($fecha='', $unidad='', $placas='', $imei='', $recarga='', $usuario='', $password='', $idEmpresa='', $datos=0, $gps=0){
		$this->fecha = $fecha;
		$this->unidad = $unidad;
		$this->placas = $placas;
		$this->imei = $imei;
		$this->recarga = $recarga;
		$this->usuario = $usuario;
		$this->password = $password;

		$this->idEmpresa = $idEmpresa;

		$this->datos = $datos;
		$this->gps = $gps;
		$this->idPruebas = ($this->datos + $this->gps) + 1;
	}

	// Getters and Setters

	// Funciones de alteraciones
	public function add(){
		$sql = '
		INSERT INTO localizadores (
			fecha, 
			unidad,  
			placas,  
			imei,
			recarga,
			usuario,
			password,
			idEmpresa,
			idPruebas
		) VALUES (
			"'.$this->fecha.'", 
			"'.$this->unidad.'", 
			"'.$this->placas.'", 
			"'.$this->imei.'",
			"'.$this->recarga.'", 
			"'.$this->usuario.'", 
			"'.$this->password.'", 
			"'.$this->idEmpresa.'",
			"'.$this->idPruebas.'"
		);';

		$res = executeQuery($sql);
		return $res;
	}

	public function modify($id=''){
		$sql = "
		UPDATE localizadores 
		SET 
			unidad = '".$this->unidad."', 
			placas = '".$this->placas."', 
			imei = '".$this->imei."', 
			recarga = '".$this->recarga."', 
			usuario = '".$this->usuario."', 
			password = '".$this->password."', 
			idEmpresa = '".$this->idEmpresa."', 
			idPruebas = '".$this->idPruebas."' 
		WHERE idlocalizadores = '".$id."';";

		$res = executeQuery($sql);
		return $res;
	}

	public static function delete($id=''){
		$sql = '
		DELETE FROM localizadores 
		WHERE idlocalizadores = "'.$id.'";';

		$res = executeQuery($sql);
		return $res;
	}

	// Funciones de consultas
	public static function getLocalizadoresByDate($fecha='') {
		$sql = '
		SELECT * 
		FROM localizadores 
		NATURAL JOIN empresa 
		NATURAL JOIN pruebas 
		WHERE fecha LIKE "'.$fecha.'"
		ORDER BY nombreEmpresa;';
		
		$res = executeQuery($sql);
		return $res;
	}

	public static function getLocalizadoresByAll(){
		$sql = '
		SELECT * 
		FROM localizadores 
		NATURAL JOIN empresa 
		NATURAL JOIN pruebas 
		ORDER BY fecha DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getLocalizadoresByUnidad($unidad='', $empresa=''){
		$sql = '
		SELECT  *
		FROM localizadores 
		NATURAL JOIN empresa 
		NATURAL JOIN pruebas 
		WHERE 
			unidad LIKE "%'.$unidad.'%" AND
			idEmpresa LIKE "'.$empresa.'"
		ORDER BY fecha DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getLocalizadoresById($id=''){
		$sql = '
		SELECT * 
		FROM localizadores 
		NATURAL JOIN pruebas 
		WHERE idlocalizadores = '.$id.';';
		$res = executeQuery($sql);
		return $res;
	}
}


/**
* Clase que gestiona las tablas de resultados
*/
class Tablas {
	public static function getTableFromQuery($res=''){
		$nombrePruebasCheckList = array('conteo', 'datos', 'gps');
		$tabla = '';
		if ($res->num_rows != 0) {
			$cont = 1;
			while ($registro = $res->fetch_assoc()) {
				$color = Tablas::getColors($registro);
				$tabla = $tabla.Tablas::getRow($cont, $registro, $color);
				$cont++;
			}
		} else {
			$tabla = $tabla.file_get_contents('../../assets/pages/localizadores/vacio.html');
		}

		return $tabla;
	}

	public static function getTableFromQueryWithoutButtons($res='', $pdf=false){
		$nombrePruebasCheckList = array('conteo', 'datos', 'gps');
		$tabla = '';
		if ($res->num_rows != 0) {
			while ($registro = $res->fetch_assoc()) {
				$color = Tablas::getColors($registro,$pdf);
				$tabla = $tabla.Tablas::getRow(0, $registro, $color, false);
			}
		} else {
			$tabla = $tabla.file_get_contents('../../assets/pages/localizadores/vacioWithoutButtons.html');
		}

		return $tabla;
	}

	public static function getColors(&$registro='',$pdf=false){
		$nombrePruebasCheckList = array('conteo', 'datos', 'gps');
		$color = array();

		foreach ($registro as $claveRegistro => $valorRegistro) {
			foreach ($nombrePruebasCheckList as $nombrePrueba) {

				if ($claveRegistro == $nombrePrueba && $valorRegistro == 1) {
					if(!$pdf){
						$registro[$claveRegistro] = '<i class="fas fa-check"></i>';
					} else {
						$registro[$claveRegistro] = 'si';
					}
					$color[$claveRegistro] = 'success';

				} else if ($claveRegistro == $nombrePrueba && $valorRegistro == 0) {
					if(!$pdf){
						$registro[$claveRegistro] = '<i class="fas fa-times"></i>';
					} else {
						$registro[$claveRegistro] = 'no';
					}
					$color[$claveRegistro] = 'danger';
				}
			}
		}

		return $color;
	}

	public static function getRow($cont=1, $registro='', $color='', $buttons=true){
		$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
		$tipo = $datos['idTipo'];

		$tabla = $tabla.'
		<tr>';
		if ($buttons) {
			$tabla = $tabla.'
			<td class="text-center bg-primary"><b>'.$cont.'</b></td>';
		}
		$tabla = $tabla.'
			<td class="text-center">'.Fechas::dateFromMySQLToNormal($registro['fecha']).'</td>
			<td class="text-center">'.$registro['nombreEmpresa'].'</td>
			<td class="text-center">'.$registro['unidad'].'</td>
			<td class="text-center">'.$registro['placas'].'</td>
			<td class="text-center">'.$registro['imei'].'</td>
			<td class="text-center">'.$registro['usuario'].'</td>
			<td class="text-center">'.$registro['password'].'</td>
			<td class="text-center '.$color['datos'].'">'.$registro['datos'].'</td>
			<td class="text-center '.$color['gps'].'">'.$registro['gps'].'</td>';
		if ($buttons && ($tipo == 1 || $tipo == 2)) {
			$tabla = $tabla.'
			<td class="text-center">
				<a href="editar.php?id='.$registro['idLocalizadores'].'" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
			</td>';
			if ($tipo == 1) {
				$tabla = $tabla.'
				<td class="text-center">
					<a href="confirmacion.php?id='.$registro['idLocalizadores'].'" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
				</td>';
			}
		}
		$tabla = $tabla.'
		</tr>';
		return $tabla;
	}
}
?>