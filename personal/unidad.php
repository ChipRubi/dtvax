<?php 

include '../core/DBConnection.php';

$sql = "SELECT idReparaciones, unidad FROM id3460579_dtvax.reparaciones_datos;";
$res = executeQuery($sql);
while ($registro = $res->fetch_assoc()) {
	$update = '';
	if (strlen($registro['unidad']) == 1) {
		$update = "UPDATE id3460579_dtvax.reparaciones_datos SET unidad='00".$registro['unidad']."' WHERE idReparaciones='".$registro['idReparaciones']."';";
	} elseif (strlen($registro['unidad']) == 2) {
		$update = "UPDATE id3460579_dtvax.reparaciones_datos SET unidad='0".$registro['unidad']."' WHERE idReparaciones='".$registro['idReparaciones']."';";
	}
	if ($update != '') {
		$otro = executeQuery($update);
		echo $update;
		var_dump($registro);
	}
}
echo "Listo XD";

 ?>