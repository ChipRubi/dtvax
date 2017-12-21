<?php 

include 'model.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if (!($datos['idTipo'] == 1 || $datos['idTipo'] == 2)) {
	header('Location: index.php');
}

if (!isset($_POST['submit'])) {
	$id = $_POST['id'];
	$fecha = $_POST['fecha'];
	$unidad= $_POST['unidad'];
	$equipo= $_POST['equipo'];

	$idEmpresa= $_POST['idEmpresa'];
	$idTecnico= $_POST['idTecnico'];

	$conteo = 0;
	$datos = 0;
	$gps = 0;
	if (isset($_POST['conteo'])) {
		$conteo = $_POST['conteo'];
	}
	if (isset($_POST['datos'])) {
		$datos = $_POST['datos'];
	}
	if (isset($_POST['gps'])) {
		$gps = $_POST['gps'];
	}

	$instalacion = new Instalacion($fecha, $unidad, $equipo, $idEmpresa, $idTecnico, $conteo, $datos, $gps);
	$res = $instalacion->modify($id);
	if ($res) {
		header('Location: index.php');
	}
}

?>