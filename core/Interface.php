<?php 

/**
* Clase que permite reutilizar codigo
*/
class View {

	// Propierties
	private $header;
	private $body;
	private $footer;
	private $menu;
	private $dictionary;

	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor = '__construct'.$num_params;

		if (method_exists($this, $funcion_constructor)) {
			call_user_func_array(array($this, $funcion_constructor), $params);
		}
	}

	public function __construct0(){
		$this->header = '';
		$this->body = '';
		$this->footer = '';
		$this->menu = '';
		$this->dictionary = array();
	}

	public function __construct3($header, $body, $footer){
		$this->header = $header;
		$this->menu = '';
		$this->body = $body;
		$this->footer = $footer;
		$this->dictionary = array();
	}

	public function __construct4($header, $body, $footer, $dictionary){
		$this->header = $header;
		$this->menu = '';
		$this->body = $body;
		$this->footer = $footer;
		$this->dictionary = $dictionary;
	}

	public function __construct5($header, $menu, $body, $footer, $dictionary){
		$this->header = $header;
		$this->menu = $menu;
		$this->body = $body;
		$this->footer = $footer;
		$this->dictionary = $dictionary;
	}

	// Getters
	public function getHeader(){
		return $this->header;
	}
	public function getMenu(){
		return $this->menu;
	}
	public function getBody(){
		return $this->body;
	}
	public function getFooter(){
		return $this->footer;
	}
	public function getDictionary(){
		return $this->dictionary;
	}

	// Setters
	public function setHeader($header){
		$this->header = $header;
	}
	public function setMenu($menu){
		$this->menu = $menu;
	}
	public function setBody($body){
		$this->body = $body;
	}
	public function setFooter($footer){
		$this->footer = $footer;
	}
	public function setDictionary($dictionary){
		$this->dictionary = $dictionary;
	}

	// Methods
	public function replace(){
		foreach ($this->dictionary as $key => $value) {
			$this->header = str_replace('['.$key.']', $value, $this->header);
			$this->menu = str_replace('['.$key.']', $value, $this->menu);
			$this->body = str_replace('['.$key.']', $value, $this->body);
			$this->footer = str_replace('['.$key.']', $value, $this->footer);
		}
	}

	public function addValueToDictionary($key, $value){
		$this->dictionary[$key] = $value;
	}

	public function addArrayToDictionary($vArray){
		foreach ($vArray as $key => $value) {
			$this->dictionary[$key] = $value;
		}
	}

	public function printInterface(){
		print($this->header);
		print($this->menu);
		print($this->body);
		print($this->footer);
	}
}

?>