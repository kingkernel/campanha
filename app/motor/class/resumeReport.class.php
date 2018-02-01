<?php
/*
data criação: 31/01/2018
*/
class resumeReport{
	public $somacontent;
	public $total;
	public $cidades = [];
	public $bairros = [];
	public $reportItens = [];
	public function __construct(){

	}
	public function getResume(){
		$sql = 'call sp_getcidades('.$_SESSION["userinfo"]["idlicenca"].')';
		$query = retornadbinfo($sql);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$this->cidades = $data["cidades"];

		$sql = 'call sp_getbairros('.$_SESSION["userinfo"]["idlicenca"].')';
		$query = retornadbinfo($sql);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$this->bairros = $data["bairros"];

		$sql = 'call sp_getresume('.$_SESSION["userinfo"]["idlicenca"].')';
		$query = retornadbinfo($sql);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$this->total = $data["total"];
		return $this->total;
	}
	public function html(){
	$this->somacontent = '<style>.glyphicon { margin-right:5px;}
.rating .glyphicon {font-size: 18px;}
.rating-num { margin-top:0px;font-size: 45px; }
.progress { margin-bottom: 5px;}
.progress-bar { text-align: left;}
/* .rating-desc .col-md-3 {padding-right: 0px;} */
.overbarprogress {margin-left: 5px; overflow: visible;clip: auto;}</style>
<div class="container" style="margin-left: 5px">
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="well well-sm">
				<div class="row">
					<div class="text-center">
						<h1 class="rating-num">Resumo</h1>
						<div class="rating">
							<span class="glyphicon glyphicon-user"></span>total : <span class="label label-warning">'.$this->total.'</span>
						</div>
						<div class="rating">
							<a href="#"> SANTANA</a> <span class="glyphicon glyphicon-map-marker" style="color:#A12C2D"></span>
						</div>
							<!-- teste 2 -->';
foreach ($this->reportItens as $key => $value) {
	$this->somacontent .= $value->html();
};

$this->somacontent .= '<!-- fim teste 2 -->
					</div>
					<!-- teste -->
				</div>
			</div>
		</div>
	</div>
</div>';
return $this->somacontent;
	}
}
?>