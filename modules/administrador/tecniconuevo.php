<?php 

require_once 'model.php';

if (!isset($_POST['submit'])) {
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];

	$tecnico = new Tecnico($nombres, $apellidos);
	$res = $tecnico->add();

	if ($res) {
		header('Location: index.php');
	}
}

?>