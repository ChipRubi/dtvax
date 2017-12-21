<?php 

require_once 'model.php';

$datos = GeneralQuerys::getUserDataById($_SESSION['sessionId']);
if (!($datos['idTipo'] == 1 || $datos['idTipo'] == 2)) {
	header('Location: index.php');
}


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$res = Localizador::getLocalizadoresById($id);
	$valores = array();
	if ($registro = $res->fetch_assoc()) {
		foreach ($registro as $claveRegistro => $valorRegistro) {
			$valores[strtoupper($claveRegistro)] = $valorRegistro;

			foreach ($checkListPruebas as $calve => $valor) {
				if ($claveRegistro == $valor && $valorRegistro == 1) {
					$valores[strtoupper($claveRegistro)] = 'checked';
				} else if ($claveRegistro == $valor && $valorRegistro == 0) {
					$valores[strtoupper($claveRegistro)] = '';
				}
			}
		}

		$empresa = Listas::getSelectEmpresaById($registro['idEmpresa']);

		$reparaciones_editar_view = new View('localizadores/editar', $filesReplace);
		$reparaciones_editar_view->addArrayToDictionary($filesModules);
		$reparaciones_editar_view->addArrayToDictionary($valores);
		$reparaciones_editar_view->addValueToDictionary('SELECT_EMPRESA', $empresa);
		$reparaciones_editar_view->printInterface();
	} else {
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}

?>