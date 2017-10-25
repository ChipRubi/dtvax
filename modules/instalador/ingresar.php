<?php 

include 'core/DBConnection.php';

if (!isset($_POST['submit'])) {
	$fecha = preg_split('/-/', $_POST['fecha']);
	$comentario = $_POST['comentarios'];
	$sql = "
	INSERT INTO dtvax.infoinstalador (
		nombreOperadorPropietario, 
		telefono, 
		vehiculoMarca, 
		modelo, 
		color, 
		placas, 
		empresa, 
		noBus, 
		instalador, 
		lugar, 
		fecha, 
		horaEntrada,
		claxon, 
		lucesIntermitentes, 
		faros, 
		lucesTablero, 
		encendedor, 
		reloj, 
		ventiladorCalefaccionAA, 
		limpiadores, 
		lucesPlacas, 
		timbre, 
		espejosLaterales, 
		fugasAire, 
		aperturaPuertaRR, 
		aperturaPuertaFR, 
		luzInterior, 
		luzFreno, 
		luzTraseras, 
		luzReversa, 
		luzNavegacion, 
		alarmaReversa,
		comentarios
	) VALUES (
		'".$_POST['propietario']."', 
		'".$_POST['telefono']."', 
		'".$_POST['marca']."', 
		'".$_POST['modelo']."', 
		'".$_POST['color']."', 
		'".$_POST['placas']."', 
		'".$_POST['empresa']."', 
		'".$_POST['nBus']."', 
		'".$_POST['instalador']."', 
		'".$_POST['lugar']."', 
		'".$fecha[2]."-".$fecha[1]."-".$fecha[0]."', 
		'".$_POST['horaEntrada'].":00',
		'".$_POST['claxon']."', 
		'".$_POST['lucesIntermitentes']."', 
		'".$_POST['faros']."', 
		'".$_POST['lucesTablero']."', 
		'".$_POST['encendedor']."', 
		'".$_POST['reloj']."', 
		'".$_POST['ventilador']."', 
		'".$_POST['limpiadores']."', 
		'".$_POST['lucesPlacas']."', 
		'".$_POST['timbre']."', 
		'".$_POST['espejosLaterales']."', 
		'".$_POST['fugasAire']."', 
		'".$_POST['aperturaRR']."', 
		'".$_POST['aperturaFR']."', 
		'".$_POST['luzInterior']."', 
		'".$_POST['luzFreno']."', 
		'".$_POST['lucesTraceras']."', 
		'".$_POST['luzReversa']."', 
		'".$_POST['lucesNavegacion']."', 
		'".$_POST['alarmaReversa']."',
		'".$_POST['comentarios']."'
	)";
	$res = executeQuery($sql);
	if ($res) {
		header('Location: index.php');
	}
}
?>