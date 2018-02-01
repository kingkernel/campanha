<?php
/*
Data criação: 17/02/2018
Última alteração: 17/02/2018
*/
class topmenu_campanha {
	public $nav;
	public function __construct(){	
	}
	public function html(){
		$nav = new topnav;
		$nav->brand = "Campanha  <span class=\"glyphicon glyphicon-repeat\"></span>";
		$relatorio = new li_item;
			$relatorio->text = "Relatórios";
			$relatorio->link = "/report/";
			$relatorio->iconclass = "glyphicon glyphicon-list-alt";

		$mapa = new li_item;
			$mapa->text = "Mapa" ;
			$mapa->iconclass = "glyphicon glyphicon-globe";
			$mapa->link = "/mapa/";

		$use_info = new li_user_info;
		$use_info->nomedisplay = $_SESSION["userinfo"]["nome"];
		$use_info->exitlink = "/auth/logout/";

		$cadastro = new li_dropdown;
		$cadastro->text = "Cadastro";
		$cadastro->iconclass = "glyphicon glyphicon-plus-sign";
			$assessor = new li_item;
			$assessor->text = "Lideres";
			$assessor->link = "/create/assessor/";
			$eleitor = new li_item;
			$eleitor->text = "Simpatizantes";
			$eleitor->link = "/create/eleitor/";
			$tarefas = new li_item;
			$tarefas->text = "Tarefas";
		$cadastro->subitem = [$assessor, $eleitor, $tarefas];

	$nav->itensleft = [$cadastro, $relatorio, $mapa];
	$nav->itensright = [$use_info];
			$bottombar = new navbottom;
	$this->nav = $nav->html().$bottombar->html();;
	return $this->nav;
	}
}
?>