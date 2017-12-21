<?php 

require_once 'model.php';

if (!isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];

	$empresa = new Empresa($nombre);
	$res = $empresa->add();

	if ($res) {
		header('Location: index.php');
	}
}

?>