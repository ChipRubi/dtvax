<?php 

require_once '../../core/checkSession.php';
require_once '../../core/Interface.php';

/**
* 
*/
class Estadisticas{
	public static function getReparacionesTecnicosByFecha($fecha=''){
		$sql = '
		SELECT idTecnico, nombreTecnico, apellidosTecnico, COUNT(*) AS total
		FROM reparaciones
		NATURAL JOIN tecnico 
		WHERE fecha LIKE "%'.$fecha.'%"
		GROUP BY idTecnico
		ORDER BY total DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesTecnicosByFecha($fecha=''){
		$sql = '
		SELECT idTecnico, nombreTecnico, apellidosTecnico, COUNT(*) AS total
		FROM instalaciones
		NATURAL JOIN tecnico 
		WHERE fecha LIKE "%'.$fecha.'%"
		GROUP BY idTecnico
		ORDER BY total DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getReparacionesEmpresasByFecha($fecha=''){
		$sql = '
		SELECT idEmpresa, nombreEmpresa, COUNT(*) AS total
		FROM reparaciones
		NATURAL JOIN empresa 
		WHERE fecha LIKE "%'.$fecha.'%" 
		GROUP BY idEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesEmpresasByFecha($fecha=''){
		$sql = '
		SELECT idEmpresa, nombreEmpresa, COUNT(*) AS total
		FROM instalaciones 
		NATURAL JOIN empresa 
		WHERE fecha LIKE "%'.$fecha.'%" 
		GROUP BY idEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getReparacionesTecnicosByAll(){
		$sql = '
		SELECT idTecnico, nombreTecnico, apellidosTecnico, COUNT(*) AS total
		FROM reparaciones
		NATURAL JOIN tecnico 
		GROUP BY idTecnico
		ORDER BY total DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesTecnicosByAll(){
		$sql = '
		SELECT idTecnico, nombreTecnico, apellidosTecnico, COUNT(*) AS total
		FROM instalaciones
		NATURAL JOIN tecnico 
		GROUP BY idTecnico
		ORDER BY total DESC;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getReparacionesEmpresasByAll(){
		$sql = '
		SELECT idEmpresa, nombreEmpresa, COUNT(*) AS total
		FROM reparaciones
		NATURAL JOIN empresa 
		GROUP BY idEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}

	public static function getInstalacionesEmpresasByAll(){
		$sql = '
		SELECT idEmpresa, nombreEmpresa, COUNT(*) AS total
		FROM instalaciones
		NATURAL JOIN empresa 
		GROUP BY idEmpresa;';

		$res = executeQuery($sql);
		return $res;
	}
}

/**
* 
*/
class ChartValues {
	public static function getChartEmpresasValues($opcion='', $fecha=''){
		if ($opcion == 'reparaciones') {
			if ($fecha == 'dia') {
				$res = Estadisticas::getReparacionesEmpresasByFecha(Fechas::getTodayDay());
			} elseif ($fecha == 'mes') {
				$res = Estadisticas::getReparacionesEmpresasByFecha(Fechas::getTodayMonth());
			} elseif ($fecha == 'anio') {
				$res = Estadisticas::getReparacionesEmpresasByFecha(Fechas::getTodayYear());
			} elseif ($fecha == 'todo') {
				$res = Estadisticas::getReparacionesEmpresasByAll();
			}
		} elseif ($opcion == 'instalaciones') {
			if ($fecha == 'dia') {
				$res = Estadisticas::getInstalacionesEmpresasByFecha(Fechas::getTodayDay());
			} elseif ($fecha == 'mes') {
				$res = Estadisticas::getInstalacionesEmpresasByFecha(Fechas::getTodayMonth());
			} elseif ($fecha == 'anio') {
				$res = Estadisticas::getInstalacionesEmpresasByFecha(Fechas::getTodayYear());
			} elseif ($fecha == 'todo') {
				$res = Estadisticas::getInstalacionesEmpresasByAll();
			}
		} elseif ($opcion == '') {
			$res = Estadisticas::getReparacionesEmpresasByFecha(Fechas::getTodayDay());
		}
		$empresa = Arreglo::getChartValuesArray('empresa');

		$cont = 1;
		while ($datos = $res->fetch_assoc()) {
			$color = Color::getRGBColor();
			$valores = Arreglo::getChartValuesToAdd('empresa', $datos['nombreEmpresa'], $datos['total'], $color);
			$empresa = Arreglo::addValuesToArray($empresa, $valores, $cont, $res->num_rows);
			$cont++;
		}
		$empresa = Arreglo::addEndToArray($empresa);
		return $empresa;
	}

	public static function getChartTecnicosValues($opcion='', $fecha=''){
		if ($opcion == 'reparaciones') {
			if ($fecha == 'dia') {
				$res = Estadisticas::getReparacionesTecnicosByFecha(Fechas::getTodayDay());
			} elseif ($fecha == 'mes') {
				$res = Estadisticas::getReparacionesTecnicosByFecha(Fechas::getTodayMonth());
			} elseif ($fecha == 'anio') {
				$res = Estadisticas::getReparacionesTecnicosByFecha(Fechas::getTodayYear());
			} elseif ($fecha == 'todo') {
				$res = Estadisticas::getReparacionesTecnicosByAll();
			}
		} elseif ($opcion == 'instalaciones') {
			if ($fecha == 'dia') {
				$res = Estadisticas::getInstalacionesTecnicosByFecha(Fechas::getTodayDay());
			} elseif ($fecha == 'mes') {
				$res = Estadisticas::getInstalacionesTecnicosByFecha(Fechas::getTodayMonth());
			} elseif ($fecha == 'anio') {
				$res = Estadisticas::getInstalacionesTecnicosByFecha(Fechas::getTodayYear());
			} elseif ($fecha == 'todo') {
				$res = Estadisticas::getInstalacionesTecnicosByAll();
			}
		} elseif ($opcion == '') {
			$res = Estadisticas::getReparacionesTecnicosByFecha(Fechas::getTodayDay());
		}
		$tecnico = Arreglo::getChartValuesArray('tecnico');

		$cont = 1;
		while ($datos = $res->fetch_assoc()) {
			if ($datos['idTecnico'] == 1) {
				$datos['nombreTecnico'] = 'No Asignado';
			}
			$color = Color::getRGBColor();
			$valores = Arreglo::getChartValuesToAdd('tecnico', $datos['nombreTecnico'], $datos['total'], $color);
			$tecnico = Arreglo::addValuesToArray($tecnico, $valores, $cont, $res->num_rows);
			$cont++;
		}
		$tecnico = Arreglo::addEndToArray($tecnico);
		return $tecnico;
	}
}

/**
* 
*/
class Arreglo {
	public static function getChartValuesArray($nombre=''){
		$variable = array(
			'labels_'.$nombre => '[', 
			'data_'.$nombre => '[', 
			'bgcolor_'.$nombre => '[', 
			'bdrcolor_'.$nombre => '['
		);
		return $variable;
	}

	public static function getChartValuesToAdd($nombre='', $label='', $data='', $color=''){
		$valores = array(
			'labels_'.$nombre => '"'.$label.'"', 
			'data_'.$nombre => $data, 
			'bgcolor_'.$nombre => '"rgba('.$color.', 0.7)"', 
			'bdrcolor_'.$nombre => '"rgba('.$color.', 1)"'
		);
		return $valores;
	}

	public static function addValuesToArray($arreglo='', $valores='', $cont='', $rows=''){
		foreach ($arreglo as $clave => $valor) {
			$arreglo[$clave] = $valor.$valores[$clave];
		}

		if ($cont != $rows) {
			foreach ($arreglo as $clave => $valor) {
				$arreglo[$clave] = $valor.', ';
			}
		}
		return $arreglo;
	}

	public static function addEndToArray($arreglo=''){
		foreach ($arreglo as $clave => $valor) {
			$arreglo[$clave] = $valor.']';
		}
		return $arreglo;
	}
}

/**
* 
*/
class Color {
	public static function getRGBColor(){
		$red = rand(0, 255);
		$green = rand(0, 255);
		$blue = rand(0, 255);

		$color = $red.', '.$green.', '.$blue;
		return $color;
	}
}

?>