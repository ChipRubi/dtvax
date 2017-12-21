<?php 

require_once '../../lib/PHPExcel/Classes/PHPExcel.php';

/**
* 
*/
class Excel{
	private $objPHPExcel;
	private $res;
	private $fecha;


	function __construct($res='', $fecha='', $titulos=''){
		$this->res = $res;
		$this->fecha = $fecha;
		$this->objPHPExcel = new PHPExcel();
		$this->objPHPExcel->getProperties()
		->setCreator("Chip")
		->setLastModifiedBy("Chip")
		->setTitle("Informe");

		$this->setColumnIndex($titulos);
	}

	public function showExcel($informe=''){
		$this->objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		$this->objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="informe-'.$informe."-".$this->fecha.'.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	public function setColumnIndex($titulos=''){
		$size = count($titulos);
		for($i=65, $cont=1;$i<=90, $cont<=$size;$i++, $cont++){
			$celda = chr($i)."1";
			$this->objPHPExcel->setActiveSheetIndex(0)->setCellValue($celda, $titulos[$celda]);
		}
	}

	public function setColumnValue($valores='', $fila=''){
		$size = count($valores);
		for($i=65, $cont=1;$i<=90, $cont<=$size;$i++, $cont++){
			$celda = chr($i).$fila;
			$this->objPHPExcel->setActiveSheetIndex(0)->setCellValue($celda, $valores[$celda]);
		}
	}
}

?>