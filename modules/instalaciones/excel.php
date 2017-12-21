<?php 

require_once 'model.php';

if (!isset($_GET['opcion'])) {
	$res = Instalacion::getInstalacionesByDate(Fechas::getTodayDateForMySQL());

} else {
	$opcion = $_GET['opcion'];
	$fecha = $_GET['fecha'];
	$unidad = $_GET['unidad'];
	$empresa =$_GET['empresa'];
	$busqueda = $_GET['busqueda'];
	if ($opcion == 'fecha') {
		$res = Instalacion::getInstalacionesByDate($fecha);
	} elseif ($opcion == 'unidad') {
		$res = Instalacion::getInstalacionesByUnidad($unidad, $empresa);
	} elseif ($opcion == 'todo') {
		$res = Instalacion::getInstalacionesByAll($busqueda);
	} else {
		$res = Instalacion::getInstalacionesByDate(Fechas::getTodayDateForMySQL());
	}
}

$titulos = array(
	'A1' => '#',
	'B1' => 'Fecha',
	'C1' => 'Unidad',
	'D1' => 'Empresa',
	'E1' => 'Equipo',
	'F1' => 'Conteo',
	'G1' => 'Datos',
	'H1' => 'GPS',
	'I1' => 'Instalador');
$excel = new Excel($res, Fechas::getTodayDate(),$titulos);

$i = 2;
while ($dato = $res->fetch_assoc()) {
	$valores = array(
		'A'.$i => $i-1,
		'B'.$i => $dato['fecha'],
		'C'.$i => $dato['unidad'],
		'D'.$i => $dato['nombreEmpresa'],
		'E'.$i => $dato['equipo'],
		'F'.$i => $dato['conteo'],
		'G'.$i => $dato['datos'],
		'H'.$i => $dato['gps'],
		'I'.$i => $dato['nombreTecnico'].$dato['apellidosTecnico']);
	$excel->setColumnValue($valores, $i);
	$i++;
}

$excel->showExcel('instalaciones');

?>