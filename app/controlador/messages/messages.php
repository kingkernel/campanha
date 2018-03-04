<?php
class  messages {
	public function __construct(){

	}
	public function index(){
		$menuup = new topmenu_campanha;
		$pagina = new page_site;
		$painel = new painelMensagens;
		// TODAS AS MENSAGENS ATÉ AGORA
		$sql = 'call sel_allmessages("'.$_SESSION["userinfo"]["id"].'")';
			try {
				$query = retornadbinfo($sql);
				$dataMsg = $query->fetch(PDO::FETCH_ASSOC);
				if($dataMsg["todas"] == 0){
					$dataMsg["todas"] = "";
				};
			} catch (Exception $e) {
				$dataMsg["todas"] = "";
			}
		$painel->titulo = '<a href="/messages/">Todas as Mensagens: '.$dataMsg["todas"].' até agora</a>';
		// TODAS AS MENAGENS NOVAS
		$sql = 'call sel_newmessages("'.$_SESSION["userinfo"]["id"].'")';
			try {
				$query = retornadbinfo($sql);
				$novas = $query->fetch(PDO::FETCH_ASSOC);
				if($novas["novas"] ==0){
				$novas["novas"] = "";	
				}
			} catch (Exception $e) {
				$novas["novas"] = "";
			};
		$painel->todas = 'Não lidas <span class="glyphicon glyphicon-envelope"></span><span class="fa fa-arrow-right" style="color:red"></span><span class="badge">'.$novas["novas"].'</span>';
		// MENSAGENS POR PESSOA
		$sql = 'call sel_noopen("'.$_SESSION["userinfo"]["id"].'")';
		try {
			$query = retornadbinfo($sql);
			$result = '<table><tr><td> <strong>Remetente</strong> </td></tr>';
			while ($dados = $query->fetch(PDO::FETCH_ASSOC)){
				$result .= '<tr><td><a href="#" onclick="loadMessage('.$dados["id"].', \''.$dados["nome"].'\')">'.$dados["nome"].'</a><div id="msgId'.$dados["id"].'"></></td></tr>';
			}
			$result .= '</table>';
		} catch (Exception $e) {
			$result = '';
		}
		$painel->novas = $result;
		// MENSAGENS ABERTAS
		$painel->enviadas = 'Mensagens já Abertas <span class="fa fa-envelope-open-o"></span><span class="fa fa-arrow-right" style="color:red"></span>';
		$sql = 'call sel_openmessages("'.$_SESSION["userinfo"]["id"].'")';
		try {
			$query = retornadbinfo($sql);
			$openBox="";
			while ($dados = $query->fetch(PDO::FETCH_ASSOC)){
				$openBox .= '<div class="alert alert-info"><strong><i><span class="label label-success">'.$dados["nome"].':</span></i></strong><blockquote>'.$dados["messagetext"].'</blockquote></div>';
			}
		} catch (Exception $e) {
			$openBox = '';
		}
		$painel->abertas = $openBox;
		// AGUARDANDO ABERTURA
		$painel->fechadastext = 'Ainda não abriram <span class="fa fa-envelope-o"> <span class="fa fa-lock"></span>';
		$sql = 'call sel_noopenmessages("'.$_SESSION["userinfo"]["id"].'")';
		try {
			$query = retornadbinfo($sql);
			$fechadas ='<table><tr><td><label class="label label-primary">Usuários :<label></td></tr>';
			while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {
				//print_r($dados); [id] => 56 [sender] => 1 [receiver] => 1 [messageopen] => 0 [nome] => Administrador [messagetext] 
				$fechadas .= '<tr><td>'.$dados["nome"].'</td></tr>';
			}
			$fechadas .= '</table>';
		} catch (Exception $e) {
			$fechadas = '';
		}
		$painel->fechadasContent = $fechadas;
		$file = "./".PUBLICDIR ."/js/this/openMessages.js";
		$js = getjs($file);
		$pagina->scriptsendpage .= $js;
		$fontawesome = fontawesome(urlcss($_GET));
		$pagina->headersinclude .= $fontawesome;
		$pagina->bodycontent = $menuup->html().$painel->html();
		$pagina->render();
	}
	public function neweditor(){
		$pagina= new page_site;
		$menuup = new topmenu_campanha;

		$jsNotify = '<script src="'.urlcss($_GET).'public/js/bootstrap-notify.min.js"></script>';
		$animateCss = '<link src="'.urlcss($_GET).'public/css/animate.min.css" rel="stylesheet"/>';

		$pagina->scriptsendpage ='CKEDITOR.replace(\'editor1\');';
		$sql = 'call sp_sel_membros('.$_SESSION["userinfo"]["idlicenca"].')';
		$query = retornadbinfo($sql);
		$pessoas = "";
		while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {
			$pessoas .= '<option value="'.$dados["id"].'">'.$dados["nome"]."</option>";
		};
		$pagina->bodycontent = $menuup->html().'<legend style="padding:20px">Mensagens</legend><div style="margin:20px"><div></div><label>Destinatário(s)</label><select style="margin-left: 20px" id="pessoa">'.$pessoas.'</select></div><div style="margin:20px"><textarea name="editor1" id="editor1"></textarea><script type="text/javascript" src="'.PUBLICDIR.'3ptn/ckeditor/ckeditor.js"></script></div><div name="controls" style="margin:20px"><button id="msgbtn" class="btn btn-primary">Enviar</button></div>'."<div id=\"result\"></div><br/><br/><br/><br/><br/>".$jsNotify.$animateCss;
		$file = "./".PUBLICDIR ."/js/this/myfirstjstest.js";
		$js = getjs($file);
		$js = str_replace("@sessiondados", $_SESSION["userinfo"]["id"], $js);
		$pagina->scriptsendpage .= $js;
		$pagina->render();
		echo "<br/><br/>";
		
	}
	public function post(){
		$funcaoMessage = getjs(".".PUBLICDIR ."js/this/messages.js");
		$find = ["@nameFunction", "@message", "@type"];
		$replace = ["result0",'<span class="glyphicon glyphicon-ok"></span> <strong>Gravado com Sucesso!</strong><hr class="message-inner-separator"><p>A informação já se encontra online a todos usuários</p>', "success"];
		$replace2 = ["result1",'<span class="glyphicon glyphicon-hand-right"></span> <strong>Erro de gravação</strong><hr class="message-inner-separator"><p>Não foi possivel adicionar os Dados. Tente novamente <span class=""></p>', "danger"];
		$js = str_replace($find, $replace, $funcaoMessage);
		$js2 = str_replace($find, $replace2, $funcaoMessage);
		$sender = $_POST["c"];		//quem enviou a mensagem
		$receiver = $_POST["b"];		//quem recebe
		$message = strip_tags($_POST["a"], "<p><a><h1><strong>");		//a mensagem
		$context = $_POST["d"];											// contexto [individual ou lista]
		$sql = 'call sp_add_messagem("'.$sender.'", "'.$receiver.'", "'.$message.'", "'.$context.'")';
		$query = fastquery_messages($sql, $js, $js2);
		$jsreturn = '<script>'.$js.$js2;
		if($query == $replace){
			$jsreturn .= 'result1();';
		} else{
			$jsreturn .= 'result0();';
		};
		echo $jsreturn.'CKEDITOR.instances["editor1"].setData();</script>';
	}
	public function openid(){
		$idmessage = $_POST["idmessage"];
		$sender = $_POST["sender"];
		$sql = 'call sel_singlemessage("'.$idmessage.'")';
		try {
			$query = retornadbinfo($sql);
			$dados = $query->fetch(PDO::FETCH_ASSOC);
			echo '<div class="alert alert-info"><strong><i><span class="label label-success">'.$sender.', </span> <small>diz:</small></i></strong><blockquote>'.$dados["messagetext"].'</blockquote></div>';
			$sql = 'update mensagens set messageopen=1 where id="'.$idmessage.'"';
			$query = fastquery($sql);
		} catch (Exception $e) {
			$dados = "";
		};
	}
}
?>