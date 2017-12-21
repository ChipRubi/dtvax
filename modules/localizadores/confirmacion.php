<?php 

require_once 'model.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if ($datos['idTipo'] != 1) {
	header('Location: index.php');
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$reparacionesView = new View('localizadores/confirmacion', $filesReplace);
	$reparacionesView->addArrayToDictionary($filesModules);
	$reparacionesView->addValueToDictionary('ID', $id);
	$reparacionesView->printInterface();
} else {
	header('Location: index.php');
}

?>