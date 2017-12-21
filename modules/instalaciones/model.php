<?php 

require_once '../../core/checkSession.php';
require_once '../../core/Interface.php';
require_once '../../core/PDFGenerate.php';
require_once '../../core/ExcelGenerate.php';

/**
* 
*/
class Instalacion {
	private $fecha;
	private $unidad;
	private $equipo;

	private $idEmpresa;
	private $idTecnico;
	private $idPruebas;

	private $conteo;
	private $datos;
	private $gps;

	function __construct($fecha='', $unidad='', $equipo='', $idEmpresa='', $idTecnico='', $conteo=0, $datos=0, $gps=0){
		$this->fecha = $fecha;
		$this->unidad = $unidad;
		$this->equipo = $equipo;

		$this->idEmpresa = $idEmpresa;
		$this->idTecnico = $idTecnico;

		$this->conteo = $conteo;
		$this->datos = $datos;
		$this->gps = $gps;
		$this->idPruebas = ($this->conteo + $this->datos + $this->gps) + 1;
	}

	// Funciones de alteraciones
	public function add(){
		$sql = '
		INSERT INTO instalaciones (
			fecha, 
			unidad,  
			equipo,  
			idEmpresa,
			idTecnico,
			idPruebas
		) VALUES (
			"'.$this->fecha.'", 
			"'.$this->unidad.'", 
			"'.$this->equipo.'", 
			"'.$this->idEmpresa.'",
			"'.$this->idTecnico.'",   
			"'.$this->idPruebas.'"
		);';

		$res = executeQuery($sql);
		return $res;
	}

	public function modify($id=''){
		$sql = "
		UPDATE instalaciones 
		SET 
			unidad = '".$this->unidad."', 
			equipo = '".$this->equipo."', 
			idEmpresa = '".$this->idEmpresa."', 
			idTecnico = '".$this->idTecnico."', 
			idPruebas = '".$this->idPruebas."' 
		WHERE idInstalaciones = '".$id."';";

		$res = executeQuery($sql);
		return $res;
	}

	public static function delete($id=''){
		$sql = '
		DELETE FROM instalaciones 
		WHERE idInstalaciones = "'.$id.'";';

		$res = executeQuery($sql);
		return $res;
	}

	// Funciones de consultas
	public static function getInstalacionesByDate($fecha='') {
		$sql = '
		SELECT * 
		FROM instalaciones 
		NATURAL JOIN empresa 
		NATURAL JOIN tecnico 
		NATURAL JOIN pruebas 
		WHERE fecha LIKE "'.$fecha.'"
		ORDER BY nombreEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesByAll(){
		$sql = '
		SELECT * 
		FROM instalaciones 
		NATURAL JOIN empresa 
		NATURAL JOIN tecnico 
		NATURAL JOIN pruebas 
		ORDER BY fecha DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesByUnidad($unidad='', $empresa=''){
		$sql = '
		SELECT  *
		FROM instalaciones 
		NATURAL JOIN empresa 
		NATURAL JOIN tecnico 
		NATURAL JOIN pruebas 
		WHERE 
			unidad LIKE "%'.$unidad.'%" AND
			idEmpresa LIKE "'.$empresa.'"
		ORDER BY fecha DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesById($id=''){
		$sql = '
		SELECT * 
		FROM instalaciones 
		NATURAL JOIN pruebas 
		WHERE idInstalaciones = '.$id.';';
		
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
			$tabla = $tabla.file_get_contents('../../assets/pages/instalaciones/vacio.html');
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
			$tabla = $tabla.file_get_contents('../../assets/pages/instalaciones/vacioWithoutButtons.html');
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
			<td class="text-center">'.$registro['unidad'].'</td>
			<td class="text-center">'.$registro['nombreEmpresa'].'</td>
			<td class="text-center">'.$registro['equipo'].'</td>
			<td class="text-center '.$color['conteo'].'">'.$registro['conteo'].'</td>
			<td class="text-center '.$color['datos'].'">'.$registro['datos'].'</td>
			<td class="text-center '.$color['gps'].'">'.$registro['gps'].'</td>
			<td class="text-center">'.$registro['nombreTecnico'].' '.$registro['apellidosTecnico'].'</td>';
		
		if ($buttons && ($tipo == 1 || $tipo == 2)) {
			$tabla = $tabla.'
			<td class="text-center">
				<a href="editar.php?id='.$registro['idInstalaciones'].'" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
			</td>';
			
			if ($tipo == 1) {
				$tabla = $tabla.'
				<td class="text-center">
					<a href="confirmacion.php?id='.$registro['idInstalaciones'].'" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
				</td>';
			}
		}
		$tabla = $tabla.'
		</tr>';
		return $tabla;
	}
}

?>