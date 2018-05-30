<?php
class panelcontrol{
	public $page;
	public function __construct(){
		$this->page = new page_site;
		return $this;
	}
	public function index(){
		$loginBox = new simpleLoginBox;
		$loginBox->action = "auth/carrier/painelAdministrativo/";
		$this->page->bodycontent = $loginBox->html();
		$this->page->render();
	}
	public function manager(){
		
	}
}
?>