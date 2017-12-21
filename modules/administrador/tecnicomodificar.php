<?php 

require_once 'model.php';

if (!isset($_POST['submit'])) {
	var_dump($_POST);
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];

	$tecnico = new Tecnico($nombre, $apellidos);
	$res = $tecnico->modify($id);

	if ($res) {
		header('Location: index.php');
	}
}

?>