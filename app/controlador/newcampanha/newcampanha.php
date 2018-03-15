<?php
class newcampanha {
	public function __construct(){
		$pagina = new page_site;
	}
	public function index(){
		echo '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Header + Video</title>
    <link rel="stylesheet" href="https://headervideo.github.io/hvheadervideo/css/fontawesome.min.css">
    <link href="https://headervideo.github.io/hvheadervideo/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://headervideo.github.io/hvheadervideo/css/mdb.min.css" rel="stylesheet">
    <link href="https://headervideo.github.io/hvheadervideo/css/style.css" rel="stylesheet">
</head>
<body>
 <!--Main Navigation-->
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./">Início</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
</nav>
</header>
    <div class="view hm-white-light jarallax" data-jarallax=\'{"speed": 0.2}\' data-jarallax-video="https://www.youtube.com/watch?v=GB27IGAb0Jw">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row">
                        <div class="col-md-12 wow fadeIn">
                            <div class="text-center text-default">
                                <h1 class="display-2 mb-2 wow fadeInDown" data-wow-delay="0.3s">Pelo Brasil</h1>
                                <h5 class="font-up mb-3 mt-1 font-bold wow fadeInDown" data-wow-delay="0.4s"><strong>A mudança não é eles, Somos nós !!!
                                <br/> Faça certo não escolha os errados.</strong></h5> 
                                <a class="btn btn-success btn-lg wow fadeInDown" data-wow-delay="0.4s href="./newcampanha/candidato/"><i class="fa fa-user"></i> Sou Candidato</a> 
                                <a class="btn btn-default btn-lg wow fadeInDown" data-wow-delay="0.4s" href="#"><i class="fa fa-shield"></i> Sou Eleitor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="py-2"></div>
<div class="container-fluid">
    <div class="row">
</div>
<hr>
<footer class="bg-dark text-white">
    <div class="text-center py-2 lead">Copyright © 2018 - Daniel J. santos <p></p></div>
</footer>
    <script type="text/javascript" src="https://headervideo.github.io/hvheadervideo/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://headervideo.github.io/hvheadervideo/js/popper.min.js"></script>
    <script src="https://headervideo.github.io/hvheadervideo/js/bootstrap.min.js"></script>
    <script src="https://headervideo.github.io/hvheadervideo/js/mdb.min.js"></script>
    <script src="https://headervideo.github.io/hvheadervideo/js/jarallax.js"></script>
    <script src="https://headervideo.github.io/hvheadervideo/js/jarallax-video.js"></script>
   <script>
       new WOW().init();
   </script>
</body>
</html>';
	}
}
?>