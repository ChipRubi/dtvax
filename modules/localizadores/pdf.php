<?php 
error_reporting(0);

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
$tabla = Tablas::getTableFromQueryWithoutButtons($res, true);

$contenido = '
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center" rowspan="2">Fecha</th>
			<th class="text-center" rowspan="2">Empresa</th>
			<th class="text-center" rowspan="2">Unidad</th>
			<th class="text-center" rowspan="2">Placas</th>
			<th class="text-center" rowspan="2">IMEI</th>
			<th class="text-center" rowspan="2">Usuario</th>
			<th class="text-center" rowspan="2">Contraseña</th>
			<th class="text-center" colspan="2">Pruebas</th>
		</tr>
		<tr>
			<th class="text-center">Corte</th>
			<th class="text-center">GPS</th>
		</tr>
	</thead>
	[TABLE]
</table>';
$header = '<h1 class="text-center">Localizadores</h1>';
$pdf = new Pdf(Fechas::getTodayDate(), $contenido, $header);
$pdf->replaceTabla($tabla);
$pdf->showPdf('localizadores');

?>