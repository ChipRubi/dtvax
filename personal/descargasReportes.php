<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<ul>
		<?php 
		echo '
		<li><a href="http://dtvax.net/reports/xlsx/Temoayenses_General_'.getReportDate().'.xlsx">Temoayenses_General_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/alm_general_'.getReportDate().'.xlsx">alm_general_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/flecha_general_'.getReportDate().'.xlsx">flecha_general_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/general_1_de_mayo_'.getReportDate().'.xlsx">general_1_de_mayo_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/general_cctsa_'.getReportDate().'.xlsx">general_cctsa_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/general_colon_'.getReportDate().'.xlsx">general_colon_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/general_cultural_'.getReportDate().'.xlsx">general_cultural_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/general_inter_'.getReportDate().'.xlsx">general_inter_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/malm_general_'.getReportDate().'.xlsx">malm_general_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/stut_general_'.getReportDate().'.xlsx">stut_general_'.getReportDate().'</a></li>
		<li><a href="http://dtvax.net/reports/xlsx/xina_general_'.getReportDate().'.xlsx">xina_general_'.getReportDate().'</a></li>
		';
		 ?>
	</ul>
</body>
</html>

<?php 
function getDay(){
	date_default_timezone_set('America/Mexico_City');
	return date("d");
}

function getMonth(){
	date_default_timezone_set('America/Mexico_City');
	return date("m");
}

function getYear(){
	date_default_timezone_set('America/Mexico_City');
	return date("y");
}

function getReportDate(){
	return getYear().getMonth().getDay()-1;
}

?>