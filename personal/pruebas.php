<?php 

include '../core/DBConnection.php';

function binario($value){
	$potencia2 = pow(2, $value);
	for ($i=0; $i < $potencia2; $i++) { 
		$num = decbin($i);
		while (strlen($num) < $value) {
			$num = '0'.$num;
		}
		echo $i."-".$num;
		echo "<br>";
	}	
}

binario(4);
echo "Listo XD";

?>