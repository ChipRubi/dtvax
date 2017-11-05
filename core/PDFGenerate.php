<?php 

include 'fpdf/fpdf.php';
include 'Constants.php';

/**
* Clase que hereda a FPDF
*/
class PDF extends FPDF
{
	public function Header()
	{
		$this->Image('../../assets/img/dtvax_logo.png', 10, 10, 60);
		$this->SetFont('Arial','B',15);
		$this->Cell(277,20,'Relacion de Reparaciones',0,0,'C', false);
		$this->Ln();
	}

	// Pie de página
	public function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->SetTextColor(0, 0, 0);
		$this->SetFillColor(255, 255, 255);
		$this->Cell(0,10,'Pagina | '.$this->PageNo().'',0,0,'C');
	}


	public function headerTableReparaciones(){
		$this->SetFont('Arial', 'B', 9);

		$this->Cell(30, 10, 'Fecha', 1, 0, 'C');
		$this->Cell(20, 10, 'Unidad', 1, 0, 'C');
		$this->Cell(35, 10, 'Empresa', 1, 0, 'C');
		$this->Cell(50, 10, 'Falla', 1, 0, 'C');
		
		// $this->Cell(20, 5, 'Pruebas', 1, 0, 'C');
		$this->Cell(14, 10, 'Conteo', 1, 0, 'C');
		$this->Cell(14, 10, 'Datos', 1, 0, 'C');
		$this->Cell(14, 10, 'Gps', 1, 0, 'C');

		$this->Cell(30, 10, 'Tecnico', 1, 0, 'C');
		$this->Cell(70, 10, 'Datalles de Reparacion', 1, 0, 'C');
		$this->Ln();
	}

	public function bodyTableReparaciones($res){
		if ($res->num_rows != 0) {
			while ($dato = $res->fetch_assoc()) {
				$chekList = array('conteo', 'datos', 'gps');
				foreach ($dato as $key => $value) {
					foreach ($chekList as $calve => $valor) {
						if ($key == $valor && $value == 1) {
							$dato[$key] = 'Si';
						} else if ($key == $valor && $value == 0) {
							$dato[$key] = 'No';
						}
					}
				}

				$this->SetFont('Arial', 'B', 8);

				$this->Cell(30, 10, $dato['fecha'], 1, 0, 'C');
				$this->Cell(20, 10, $dato['unidad'], 1, 0, 'C');
				$this->Cell(35, 10, $dato['empresa'], 1, 0, 'C');
				$this->Cell(50, 10, $dato['falla'], 1, 0, 'J');
				
				if ($dato['conteo'] == 'Si') {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(223, 240, 216);
				} else {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(242, 222, 222);
				}
				$this->Cell(14, 10, $dato['conteo'], 1, 0, 'C', true);

				if ($dato['datos'] == 'Si') {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(223, 240, 216);
				} else {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(242, 222, 222);
				}
				$this->Cell(14, 10, $dato['datos'], 1, 0, 'C', true);

				if ($dato['gps'] == 'Si') {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(223, 240, 216);
				} else {
					$this->SetTextColor(0, 0, 0);
					$this->SetFillColor(242, 222, 222);
				}
				$this->Cell(14, 10, $dato['gps'], 1, 0, 'C', true);

				$this->SetTextColor(0, 0, 0);
				$this->SetFillColor(255, 255, 255);
				$this->SetFont('Arial', 'B', 8);
				$this->Cell(30, 10, $dato['tecnico'], 1, 0, 'C');
				$this->Cell(70, 10, $dato['detalles'], 1, 0, 'J');
				$this->Ln();
			}
		} else {
			$mensajes = 'No hay reparaciones hasta este momento';
			$this->SetFont('Arial', 'B', 12);
			$this->SetTextColor(51, 122, 183);
			$this->SetFillColor(217, 237, 247);
			$this->Cell(277, 20, $mensajes, 0, 0, 'C', true);
		}
	}
}

?>