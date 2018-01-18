<?php
	$pagina = get_class_methods(get_class());
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	<title><?php echo get_class()." ".$pagina[1];?></title>
	<?php
	echo minimalheader(urlcss($_GET));
	?>
</head>
<body>
	<?php
		echo $menuup->html();
	?>
	<div class="container" style="margin-top: 10px">
		<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="panel panel-success">
				<div class="panel-heading text-"><b>Cadastro</b></div>
				<div class="panel-body">
					<?php
						$form = new formbootstrap;
						$form->action = get_class() . "/caddata/";
						$form->fieldset = 1;
						$form->legend = "Cadastro de Assessores";
							$submit = new formgroupinput;
						$form->formitens = [$submit];
						$form->render();
					/*
					[formtype] => vertical [method] => POST [action] => / [formitens] => Array ( ) [legend] => [fieldset] => [formadicionalclass] => )
					*/
					?>
				</div>
			</div>
		</div>
	<!-- -->
	<!-- -->
	</div>
</body>
</html>