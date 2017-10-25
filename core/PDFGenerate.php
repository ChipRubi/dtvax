<?php 

require 'fpdf/fpdf.php';

/**
* Clase que hereda a FPDF
*/
class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../assets/img/dtvax_logo.png', 10, 10, 100);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Título
		$this->Cell(30,10,'Relacion de Reparacioness',1,0,'C');
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Pagina | '.$this->PageNo().'',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Output();

?>