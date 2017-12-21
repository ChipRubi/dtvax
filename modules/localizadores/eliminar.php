<?php 

require_once 'model.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if ($datos['idTipo'] == 1) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$res = Localizador::delete($id);
	}
}
header('Location: index.php');

?>