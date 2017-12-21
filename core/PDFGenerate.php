<?php 
require_once '../../lib/mpdf/mpdf.php';
/**
* Clase que tiene todos los metodos para generar los pdf
*/
class Pdf{
	private $boostrap;
	private $style;
	private $contenido;
	private $mpdf;
	private $fecha;

	function __construct($fecha='', $contenido='', $header=''){
		$this->bootstrap = file_get_contents('../../assets/css/bootstrap.min.css');
		$this->style = file_get_contents('../../assets/css/informeReparaciones.css');
		$this->contenido = $contenido;
		$this->mpdf = new mPDF('','A4',0,'',15,15,25,30,9,9, 'P');
		$this->mpdf->SetHTMLHeader($header);
		$this->mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">'.$fecha.'</td>
		        <td width="33%" align="center">Página | {PAGENO}</td>
		        <td width="33%" style="text-align: right;"><img src="../../assets/img/dtvax_icon.png" class="img-responsive"></td>
		    </tr>
		</table>');
		$this->fecha = $fecha;
	}

	public function replaceTabla($tabla=''){
		$this->contenido = str_replace('[TABLE]', $tabla, $this->contenido);
		$this->contenido = mb_convert_encoding($this->contenido, 'UTF-8', 'UTF-8');
	}

	public function showPdf($informe=''){
		$this->mpdf->writeHTML($this->bootstrap, 1);
		$this->mpdf->writeHTML($this->style, 1);
		$this->mpdf->writeHTML($this->contenido);
		$this->mpdf->Output('informe-'.$informe.'-'.$this->fecha.'.pdf', 'I');
	}
}

?>