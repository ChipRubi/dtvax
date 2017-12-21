<?php 
error_reporting(0);

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
$tabla = Tablas::getTableFromQueryWithoutButtons($res, true);

$contenido = '
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center" rowspan="2">Fecha</th>
			<th class="text-center" rowspan="2">Unidad</th>
			<th class="text-center" rowspan="2">Empresa</th>
			<th class="text-center" rowspan="2">Equipo</th>
			<th class="text-center" colspan="3">Pruebas</th>
			<th class="text-center" rowspan="2">Instalador</th>
		</tr>
		<tr>
			<th class="text-center">Conteo</th>
			<th class="text-center">Datos</th>
			<th class="text-center">GPS</th>
		</tr>
	</thead>
	[TABLE]
</table>';
$header = '<h1 class="text-center">Instalaciones</h1>';
$pdf = new Pdf(Fechas::getTodayDate(), $contenido, $header);
$pdf->replaceTabla($tabla);
$pdf->showPdf('instalaciones');

?>