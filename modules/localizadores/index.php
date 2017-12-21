<?php 

require_once 'model.php';

$localizadores_principal_view = new View('localizadores/principal', $filesReplace);
$selectEmpresa = Listas::getSelectEmpresa();

$busqueda = '';
$hide = '';
$pdf = '#';
$excel = '#';
$tabla = '';
if (!isset($_GET['opcion'])) {
	$res = Localizador::getLocalizadoresByDate(Fechas::getTodayDateForMySQL());
	$tabla = Tablas::getTableFromQuery($res);
	$hide = 'hidden';
} else {
	$opcion = $_GET['opcion'];
	$fecha = $_GET['fecha'];
	$unidad = $_GET['unidad'];
	$empresa =$_GET['empresa'];

	if ($opcion == 'fecha') {
		$res = Localizador::getLocalizadoresByDate($fecha);
		if ($fecha != '') {
			$busqueda = ' para el dia '.Fechas::dateFromMySQLToNormal($fecha);
		}
	} elseif ($opcion == 'unidad') {
		$res = Localizador::getLocalizadoresByUnidad($unidad, $empresa);
		$nombreEmpresa = GeneralQuerys::getEmpresaById($empresa);
		$busqueda = 'para '.$unidad.' '.$nombreEmpresa;
	} elseif ($opcion == 'todo') {
		$res = Localizador::getLocalizadoresByAll();
		$busqueda = ' general';
	} else {
		$res = Localizador::getLocalizadoresByDate(Fechas::getTodayDateForMySQL());
	}

	$tabla = Tablas::getTableFromQuery($res);
	$pdf = 'pdf.php?opcion='.$opcion.'&fecha='.$fecha.'&unidad='.$unidad.'&empresa='.$empresa;
	$excel = 'excel.php?opcion='.$opcion.'&fecha='.$fecha.'&unidad='.$unidad.'&empresa='.$empresa;
}

$localizadores_principal_view->addArrayToDictionary($filesModules);
$localizadores_principal_view->addScriptToDictionary('instalaciones');
$localizadores_principal_view->addValueToDictionary('SELECT_EMPRESA', $selectEmpresa);
$localizadores_principal_view->addValueToDictionary('busqueda', $busqueda);
$localizadores_principal_view->addValueToDictionary('hide', $hide);
$localizadores_principal_view->addValueToDictionary('pdf', $pdf);
$localizadores_principal_view->addValueToDictionary('excel', $excel);
$localizadores_principal_view->addValueToDictionary('table', $tabla);
$localizadores_principal_view->printInterface();

?>