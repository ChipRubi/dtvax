<?php 

// Direccion principal del sitio
$config = array('base_url' => 'http://localhost/dtvax/');

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
	'temp' => 'assets/temp/',
	'mod' => 'modules/'
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
	'reparaciones_menu' => 'modules/reparaciones/',
	'instalaciones_menu' => 'modules/instalaciones/',
	'localizadores_menu' => 'modules/localizadores/',
	'estadisticas_menu' => 'modules/estadisticas/',

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

// Añadir URL
$filesReplace = addUrlToArrayValues($filesReplace);
$filesRoutes = addUrlToArrayValues($filesRoutes);

?>