<?php 

require_once 'model.php';

if (!isset($_POST['submit'])) {
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];

	$empresa = new Empresa($nombre);
	$res = $empresa->modify($id);

	if ($res) {
		header('Location: index.php');
	}
}

?>