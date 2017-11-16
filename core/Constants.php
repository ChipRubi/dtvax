<?php 

require_once 'Config.php';

function addUrlToArrayValues($arreglo){
	foreach ($arreglo as $clave => $valor) {
		$arreglo[$clave] = $GLOBALS['config']['base_url'].$valor;
	}
	return $arreglo;
}

function addUrlToString($cadena=''){
	$cadena = $GLOBALS['config']['base_url'].$cadena;
	return $cadena;
}

// Direccion de archivos
$filesRoutes = array(
	'css' => 'assets/css/',
	'js' => 'assets/js/',
	'img' => 'assets/img/',
	'pages' => 'assets/pages/',
	'temp' => 'assets/temp/'
);

$filesReplace = array(
	'bootstrap_style' => 'assets/css/bootstrap.min.css', 
	'bootstrap_script' => 'assets/js/bootstrap.min.js', 
	'jquery_script' => 'assets/js/jquery.min.js', 
	'ajax_script' => 'assets/js/ajax.js',
	'mdb_style' => 'assets/css/mdb.css', 
	'mdb_script' => 'assets/js/mdb.min.js',
	'page_style' => 'assets/css/styles.css', 

	'inicio_menu' => '',
	'instalador_menu' => 'modules/instalador/',
	'reparaciones_menu' => 'modules/reparaciones/',

	'icon' => 'assets/img/dtvax_icon.png',
	'logo' => 'assets/img/dtvax_logo.png',
	'brand' => 'assets/img/dtvax_brand.png',
	'original' => 'assets/img/dtvax_original.png',

	'close_session' => 'core/closeSession.php'
);

// Direccion de archivos en los modulos
$filesModules = array(
	'inicio' => 'index.php',
	'ingresar' => 'ingresar.php',
	'nuevo' => 'nuevo.php',
	'modificar' => 'modificar.php'
);

$checkListPruebas = array(
	'conteo', 
	'datos', 
	'gps'
);

// Diccionarios de modulos
$usuariosPrincipal = array(
	'empezar_reparaciones' => 'modules/reparaciones/',
	'informe_reparaciones' => 'modules/reparaciones/informe.php',
	'empezar_instalacion' => 'modules/instalador/',
	'informe_instalacion' => 'modules/instalador/informe.php',
);
$usuariosLogin = array('login_action' => 'core/initSession.php');
$reparaciones = array('page_script' => 'assets/js/reparaciones/reparaciones.js');

// Añadir URL
$filesReplace = addUrlToArrayValues($filesReplace);
$filesRoutes = addUrlToArrayValues($filesRoutes);
$usuariosPrincipal = addUrlToArrayValues($usuariosPrincipal);
$usuariosLogin = addUrlToArrayValues($usuariosLogin);
$reparaciones = addUrlToArrayValues($reparaciones);

?>