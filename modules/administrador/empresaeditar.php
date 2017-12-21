<?php 

require_once 'model.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$nombreEmpresa = Empresa::getEmpresaNameById($id);

	$admin_principal_view = new View('administrador/empresa/editar', $filesReplace);
	$admin_principal_view->addArrayToDictionary($filesModules);
	$admin_principal_view->addValueToDictionary('id', $id);
	$admin_principal_view->addValueToDictionary('nombre', $nombreEmpresa);
	$admin_principal_view->printInterface();	
} else {
	header('Location: index.php');
}

?>