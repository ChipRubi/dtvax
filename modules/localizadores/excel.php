<?php 

require_once 'model.php';

if (!isset($_GET['opcion'])) {
	$res = Localizador::getLocalizadoresByDate(Fechas::getTodayDateForMySQL());

} else {
	$opcion = $_GET['opcion'];
	$fecha = $_GET['fecha'];
	$unidad = $_GET['unidad'];
	$empresa =$_GET['empresa'];
	$busqueda = $_GET['busqueda'];
	if ($opcion == 'fecha') {
		$res = Localizador::getLocalizadoresByDate($fecha);
	} elseif ($opcion == 'unidad') {
		$res = Localizador::getLocalizadoresByUnidad($unidad, $empresa);
	} elseif ($opcion == 'todo') {
		$res = Localizador::getLocalizadoresByAll($busqueda);
	} else {
		$res = Localizador::getLocalizadoresByDate(Fechas::getTodayDateForMySQL());
	}
}

$titulos = array(
	'A1' => '#',
	'B1' => 'Fecha',
	'C1' => 'Empresa',
	'D1' => 'Unidad',
	'E1' => 'Placas',
	'F1' => 'IMEI',
	'G1' => 'Usuario',
	'H1' => 'Contraseña',
	'I1' => 'Corte',
	'J1' => 'GPS');
$excel = new Excel($res, Fechas::getTodayDate(),$titulos);

$i = 2;
while ($dato = $res->fetch_assoc()) {
	$valores = array(
		'A'.$i => $i-1,
		'B'.$i => $dato['fecha'],
		'C'.$i => $dato['nombreEmpresa'],
		'D'.$i => $dato['unidad'],
		'E'.$i => $dato['placas'],
		'F'.$i => $dato['imei'],
		'G'.$i => $dato['usuario'],
		'H'.$i => $dato['password'],
		'I'.$i => $dato['datos'],
		'J'.$i => $dato['gps']);
	$excel->setColumnValue($valores, $i);
	$i++;
}

$excel->showExcel('localizadores');

?>