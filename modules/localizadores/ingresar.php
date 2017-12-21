<?php 

require_once 'model.php';

if (!isset($_POST['submit'])) {
	$fecha = $_POST['fecha'];
	$unidad = $_POST['unidad'];
	$placas = $_POST['placas'];
	$imei = $_POST['imei'];
	$recarga = $_POST['fecha'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$idEmpresa = $_POST['idEmpresa'];

	$datos = 0;
	$gps = 0;
	if (isset($_POST['datos'])) {
		$datos = $_POST['datos'];
	}
	if (isset($_POST['gps'])) {
		$gps = $_POST['gps'];
	}

	$localizador = new Localizador($fecha, $unidad, $placas, $imei, $recarga, $usuario, $password, $idEmpresa, $datos, $gps);
	$res = $localizador->add();

	if ($res) {
		header('Location: index.php');
	}
}

?>