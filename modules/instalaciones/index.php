<?php 

require_once 'model.php';

$instalaciones_principal_view = new View('instalaciones/principal', $filesReplace);
$selectEmpresa = Listas::getSelectEmpresa();

$busqueda = '';
$hide = '';
$pdf = '#';
$excel = '#';
$tabla = '';
if (!isset($_GET['opcion'])) {
	$res = Instalacion::getInstalacionesByDate(Fechas::getTodayDateForMySQL());
	$tabla = Tablas::getTableFromQuery($res);
	$hide = 'hidden';
} else {
	$opcion = $_GET['opcion'];
	$fecha = $_GET['fecha'];
	$unidad = $_GET['unidad'];
	$empresa =$_GET['empresa'];

	if ($opcion == 'fecha') {
		$res = Instalacion::getInstalacionesByDate($fecha);
		if ($fecha != '') {
			$busqueda = ' para el dia '.Fechas::dateFromMySQLToNormal($fecha);
		}
	} elseif ($opcion == 'unidad') {
		$res = Instalacion::getInstalacionesByUnidad($unidad, $empresa);
		$nombreEmpresa = GeneralQuerys::getEmpresaById($empresa);
		$busqueda = 'para '.$unidad.' '.$nombreEmpresa;
	} elseif ($opcion == 'todo') {
		$res = Instalacion::getInstalacionesByAll();
		$busqueda = ' general';
	} else {
		$res = Instalacion::getInstalacionesByDate(Fechas::getTodayDateForMySQL());
	}

	$tabla = Tablas::getTableFromQuery($res);
	$pdf = 'pdf.php?opcion='.$opcion.'&fecha='.$fecha.'&unidad='.$unidad.'&empresa='.$empresa;
	$excel = 'excel.php?opcion='.$opcion.'&fecha='.$fecha.'&unidad='.$unidad.'&empresa='.$empresa;
}

$instalaciones_principal_view->addArrayToDictionary($filesModules);
$instalaciones_principal_view->addScriptToDictionary('instalaciones');
$instalaciones_principal_view->addValueToDictionary('SELECT_EMPRESA', $selectEmpresa);
$instalaciones_principal_view->addValueToDictionary('busqueda', $busqueda);
$instalaciones_principal_view->addValueToDictionary('hide', $hide);
$instalaciones_principal_view->addValueToDictionary('pdf', $pdf);
$instalaciones_principal_view->addValueToDictionary('excel', $excel);
$instalaciones_principal_view->addValueToDictionary('table', $tabla);
$instalaciones_principal_view->printInterface();

?>