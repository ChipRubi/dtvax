<?php 

require_once 'Constants.php';

/**
* Clase que permite reutilizar codigo
*/
class View {

	// Propierties
	private $header;
	private $menu;
	private $body;
	private $footer;
	private $dictionary;

	public function __construct($page='', $dictionary){
		$this->header = file_get_contents($GLOBALS['filesRoutes']['temp'].'header.html');
		$this->menu = file_get_contents($GLOBALS['filesRoutes']['temp'].'menu.html');
		$this->footer = file_get_contents($GLOBALS['filesRoutes']['temp'].'footer.html');
		$this->body = file_get_contents($GLOBALS['filesRoutes']['pages'].$page.'.html');
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
			$this->header = str_replace('['.strtoupper($key).']', $value, $this->header);
			$this->menu = str_replace('['.strtoupper($key).']', $value, $this->menu);
			$this->body = str_replace('['.strtoupper($key).']', $value, $this->body);
			$this->footer = str_replace('['.strtoupper($key).']', $value, $this->footer);
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

	public function addScriptToDictionary($script=''){
		if ($script == '') {
			$this->dictionary['page_script'] = '';
		} else {
			$this->dictionary['page_script'] = '<script src="'.$GLOBALS['filesRoutes']['js'].$script.'.js"></script>';
		}
	}

	public function printInterface(){
		$this->replace();
		print($this->header);
		print($this->menu);
		print($this->body);
		print($this->footer);
	}
}

?>