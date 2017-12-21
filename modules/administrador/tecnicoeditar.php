<?php 

require_once 'model.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$tecnico = Tecnico::getTecnicoNameById($id);

	$admin_principal_view = new View('administrador/tecnico/editar', $filesReplace);
	$admin_principal_view->addArrayToDictionary($filesModules);
	$admin_principal_view->addValueToDictionary('id', $id);
	$admin_principal_view->addValueToDictionary('nombre', $tecnico['nombreTecnico']);
	$admin_principal_view->addValueToDictionary('apellidos', $tecnico['apellidosTecnico']);
	$admin_principal_view->printInterface();	
} else {
	header('Location: index.php');
}

?>