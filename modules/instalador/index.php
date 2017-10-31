<?php

include '../../core/Constants.php';
include '../../core/Interface.php';
include '../../core/DBConnection.php';

$body = file_get_contents('../../assets/pages/instalador/principal.html');
$menu = file_get_contents('../../assets/temp/menu.html');
$header = file_get_contents('../../assets/temp/header.html');
$footer = file_get_contents('../../assets/temp/footer.html');

$date = getdate();
$fecha = $date['year'].'-'.$date['mon'].'-'.$date['mday'];

$table = '';
$sql = 'SELECT * FROM dtvax.infoinstalador WHERE fecha = "'.$fecha.'";';
$res = executeQuery($sql);
$chekList = array('conteo', 'datos', 'gps');
if ($res->num_rows != 0) {
	while ($dato = $res->fetch_assoc()) {
		foreach ($dato as $key => $value) {
			foreach ($chekList as $calve => $valor) {
				if ($key == $valor && $value == 1) {
					$dato[$key] = 'Si';
				} else if ($key == $valor && $value == 0) {
					$dato[$key] = 'No';
				}
			}
		}
		$table = $table.'
		<tr>
			<td>'.$dato['horaEntrada'].'</td>
			<td>'.$dato['nombreOperadorPropietario'].'</td>
			<td>'.$dato['telefono'].'</td>
			<td>'.$dato['vehiculoMarca'].'</td>
			<td>'.$dato['modelo'].'</td>
			<td>'.$dato['color'].'</td>
			<td>'.$dato['placas'].'</td>
			<td>'.$dato['empresa'].'</td>
			<td>'.$dato['noBus'].'</td>
			<td>'.$dato['instalador'].'</td>
			<td>'.$dato['lugar'].'</td>
			<td class="text-center">
				<a href="ver.php?id='.$dato['idInfoInstalador'].'" class="btn btn-warning btn-sm">Ver</a>
			</td>
		</tr>';
	}
} else {
	$table = file_get_contents('../../assets/pages/instalador/vacio.html');
}

$principal = new View($header, $menu, $body, $footer, $constModules);
$principal->addArrayToDictionary($constInstalador);
$principal->addValueToDictionary('TABLE', $table);
$principal->addValueToDictionary('FECHA', $fecha);
$principal->replace();
$principal->printInterface();

?>

?>