<?php

/**
Data criação: 25/05/2017
Última Alteração: 13/01/2018
**/
class cardshow{
	public $upText = "SISTEMA DE GERENCIAMENTO";
	public $descritor = "";
	public $imagemlogin = "https://scontent.ffor10-1.fna.fbcdn.net/v/t1.0-1/p160x160/23658803_1687853261288813_5244921764535079338_n.jpg?oh=77f43d384f6b01c68e8577346e9bb66e&oe=5AEF113D";
  public $downText = "Entre e começe a encontrar pessoas ou fazer negócios.";
  public $style = "default";                                 //cores padrão de classes do bootstrap
  public $headerTitle = "";
  public $headerIcon = "";
  public $headerLink = "#";
  public $headerBigIcon = "";
  public $formAction = "/auth";
	public $leftInfo = "";
  public $rigthInfo = "";
  public $bigIconLeft = "fa fa-user";
  public $bigIconLeftBadge = "Amigos";
  public $bigIconLeftTitle = "meu texto da esquerda";
  public $bigIconCenter = "glyphicon glyphicon-fire";
  public $bigIconCenterBadge = "10";
  public $bigIconRight = "glyphicon glyphicon-file";
  public $bigIconRightBadge = "6";
  public $bigIconCenterTitle = "Meu texto do meio";
  public $bigIconRightTitle = "Meu texto da direita";
  public $formTitle = "<h3>form title</h3>";

	  public function html(){
  $this->somacontent =  '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-top:10px;"><div class="panel panel-'.$this->style.'"><div class="panel-heading text-center"><b>'.$this->upText.'</b><p title="'.$this->headerTitle.'"><i class="'.$this->headerIcon.'"></i>&nbsp;<a href="'.$this->headerLink.'"><i>'.$this->descritor.'</i></a><i class="'.$this->headerBigIcon.' fa-4x pull-right"></i></p></div><div class="panel-body"><p class="text-center"><img src="'.$this->imagemlogin.'" style="height:125px" class="img-circle"></p><p class="text-warning"><b>'.$this->leftInfo.'</b><span class="pull-right">'.$this->rigthInfo.'</span></p></div><div class="row"></div><div class="panel-heading"><div class="row"><div class="col-xs-4 col-md-4 pull-left" title="'.$this->bigIconLeftTitle.'"><i class="'.$this->bigIconLeft.' fa-2x pull-left"></i><span class="badge">'.$this->bigIconLeftBadge.'</span></div><div class="col-xs-4 col-md-4" title="'.$this->bigIconCenterTitle.'"><i class="'.$this->bigIconCenter.' fa-2x pull-left"></i><span class="badge">'.$this->bigIconCenterBadge.'</span></div><div class="col-xs-4 col-md-4 pull-right" title="'.$this->bigIconRightTitle.'"><i class="'.$this->bigIconRight.' fa-2x pull-left"></i><span class="badge">'.$this->bigIconRightBadge.'</span></div></div><br><p>'.$this->downText.'</p><span class="text-center"><p>'.$this->formTitle.'</p></span><div><form method="POST" action="'.$this->formAction.'"><input type="text" class="form-control" name="user" style="margin:5px"><input type="password" class="form-control" name="snhpwd" style="margin:5px"><input type="submit" class="btn btn-block btn3d btn-primary" value="Entrar" ></form></div><p></p><br><p><span class="label label-success">Tecnologia</span><span class="label label-warning">Programação</span><span class="label label-danger">Python</span><span class="label label-info">Dinâmica</span></p></div></div></div>';
        return $this->somacontent;
  }
  public function render(){
	echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-top:10px;"><div class="panel panel-'.$this->style.'"><div class="panel-heading text-center"><b>'.$this->upText.'</b><p title="'.$this->headerTitle.'"><i class="'.$this->headerIcon.'"></i>&nbsp;<a href="'.$this->headerLink.'"><i>'.$this->descritor.'</i></a><i class="'.$this->headerBigIcon.' fa-4x pull-right"></i></p></div><div class="panel-body"><p class="text-center"><img src="'.$this->imagemlogin.'" style="height:125px" class="img-circle"></p><p class="text-warning"><b>'.$this->leftInfo.'</b><span></span></p></div><div class="row"></div><div class="panel-heading"><div class="row"><div class="col-xs-4 col-md-4" title="Desejos"><i class="glyphicon glyphicon-stats fa-2x pull-left"></i><span class="badge">42</span></div><div class="col-xs-4 col-md-4" title="Negócios realizados"><i class="glyphicon glyphicon-fire fa-2x pull-left"></i><span style="" class="badge"></span><span class="badge">20</span></div><div class="col-xs-4 col-md-4" title="Ganhe Certificado"><i class="glyphicon glyphicon-file fa-2x pull-left"></i><span class="badge">1</span></div></div><br><p>'.$this->downText.'</p><hr><p></p><div><form method="POST" action="'.$this->formAction.'"><input type="text" class="form-control" name="user" style="margin:5px"><input type="password" class="form-control" name="snhpwd" style="margin:5px"><input type="submit" class="btn btn-block btn3d btn-primary" value="Entrar" >/form></div><p></p><br><p><span class="label label-success">Tecnologia</span><span class="label label-warning">Programação</span><span class="label label-danger">Python</span><span class="label label-info">Dinâmica</span></p></div></div></div>';
	}
}
?>