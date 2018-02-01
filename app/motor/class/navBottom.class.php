<?php
class navBottom{
	public $name = "glyphicon glyphicon-home";
	public $nameLink;
	public $addContent;
	public function __construct(){

	}
	public function html(){
	echo '<div class="navbar navbar-inverse navbar-fixed-bottom"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".bottom-collapse">
      <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button><a class="navbar-brand pull-right" href="#" onclick="javascript: history.back(-1);"><span class="'.$this->name.'"></span>Voltar</a></div>
    <div class="navbar-collapse collapse bottom-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">more</a></li>
        <li><a href="#about">Bottom</a></li>
        <li><a href="#contact">Menus</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../navbar/">Default</a></li>
        <li><a href="../navbar-fixed-top/">Fixed Bottom</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>';
return $this->addContent;
	}
}
?>