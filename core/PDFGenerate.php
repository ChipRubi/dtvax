<?php 
require_once '../../lib/mpdf/mpdf.php';
/**
* Clase que tiene todos los metodos para generar los pdf
*/
class PdfReparaciones{
	private $boostrap;
	private $style;
	private $contenido;
	private $mpdf;
	private $fecha;

	function __construct($fecha=''){
		$this->bootstrap = file_get_contents('../../assets/css/bootstrap.min.css');
		$this->style = file_get_contents('../../assets/css/informeReparaciones.css');
		$this->contenido = '
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center" rowspan="2">Fecha</th>
					<th class="text-center" rowspan="2">Unidad</th>
					<th class="text-center" rowspan="2">Empresa</th>
					<th class="text-center" rowspan="2">Falla</th>
					<th class="text-center" colspan="3">Pruebas</th>
					<th class="text-center" rowspan="2">Técnico</th>
					<th class="text-center" rowspan="2">Detalles</th>
				</tr>
				<tr>
					<th class="text-center">Conteo</th>
					<th class="text-center">Datos</th>
					<th class="text-center">GPS</th>
				</tr>
			</thead>
			[TABLE]
		</table>';
		$this->mpdf = new mPDF('','A4',0,'',15,15,25,30,9,9, 'P');
		$this->mpdf->SetHTMLHeader('<h1 class="text-center">Relacion de Reparaciones</h1>');
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

	public function showPdf(){
		$this->mpdf->writeHTML($this->bootstrap, 1);
		$this->mpdf->writeHTML($this->style, 1);
		$this->mpdf->writeHTML($this->contenido);
		$this->mpdf->Output('informe'.$this->fecha.'.pdf', 'I');
	}
}

?>