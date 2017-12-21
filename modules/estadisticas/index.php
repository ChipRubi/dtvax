<?php 

require_once 'model.php';

$titulo = '';
if (!isset($_GET['opcion'])) {
	$tecnico = ChartValues::getChartTecnicosValues();
	$empresa = ChartValues::getChartEmpresasValues();
	$titulo = 'para las reparaciones de hoy';
	$tituloTecnico = 'Reparaciones para hoy';
	$labelTecnico = 'Reparaciones';
} else {
	$opcion = $_GET['opcion'];
	$fecha = $_GET['fecha'];

	$tecnico = ChartValues::getChartTecnicosValues($opcion, $fecha);
	$empresa = ChartValues::getChartEmpresasValues($opcion, $fecha);

	$titulo = '';
	$tituloTecnico = '';

	if ($opcion == 'reparaciones') {
		if ($fecha == 'dia') {
			$titulo = 'para las reparaciones de hoy';
		} elseif ($fecha == 'mes') {
			$titulo = 'para las reparaciones de este mes';
		} elseif ($fecha == 'anio') {
			$titulo = 'para las reparaciones de este año';
		} elseif ($fecha == 'todo') {
			$titulo = 'para todas las reparaciones';
		}
	} elseif ($opcion == 'instalaciones') {
		if ($fecha == 'dia') {
			$titulo = 'para las instalaciones de hoy';
		} elseif ($fecha == 'mes') {
			$titulo = 'para las instalaciones de este mes';
		} elseif ($fecha == 'anio') {
			$titulo = 'para las instalaciones de este año';
		} elseif ($fecha == 'todo') {
			$titulo = 'para todas las instalaciones';
		}
	}

	if ($fecha == 'dia') {
		$tituloTecnico = ucwords($opcion).' para hoy';
	} elseif ($fecha == 'mes') {
		$tituloTecnico = ucwords($opcion).' para este mes';
	} elseif ($fecha == 'anio') {
		$tituloTecnico = ucwords($opcion).' para este año';
	} elseif ($fecha == 'todo') {
		$tituloTecnico = ucwords($opcion);
	}

	$labelTecnico = ucwords($opcion);
}

$estadisticas_principal_view = new View('estadisticas/principal', $filesReplace);
$estadisticas_principal_view->addArrayToDictionary($filesModules);
$estadisticas_principal_view->addValueToDictionary('chart', $GLOBALS['filesRoutes']['js'].'Chart.min.js');
$estadisticas_principal_view->addArrayToDictionary($tecnico);
$estadisticas_principal_view->addArrayToDictionary($empresa);
$estadisticas_principal_view->addValueToDictionary('titulo', $titulo);
$estadisticas_principal_view->addValueToDictionary('titulo_tecnico', $tituloTecnico);
$estadisticas_principal_view->addValueToDictionary('opcion', $labelTecnico);
$estadisticas_principal_view->printInterface();

?>