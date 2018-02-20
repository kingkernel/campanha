<?php
class carousel{
	public function __construct(){

	}
	public function html(){
	$this->addContent = '<style type="text/css">
/* Nav Bar */
.bloco {
	height: 350px;
}
body { padding-top: 70px; }
.logo {color:red;}
.navbar-inner{
    /*height: 90px*/
    min-height: 60px
}
.nav {
    background-color: white;
}
.navbar{

    padding: 0 10px;
}
.navbar .nav > li > a {
    padding: 20px 15px;
    font-size: 150%;
}
.navbar .btn-navbar {
    /*margin-right: 0px;*/
    margin-top:15px;
}
.navbar-brand {
    padding: 20px 15px;
    font-size: 190%;
}
@media (max-width:768px) {
    .brand img{
        margin-bottom: 5px
    }
    .navbar .btn-navbar{
        /*margin-right: -15px;*/
    }
    .navbar .nav > li > a {
        padding: 10px 15px;
    }
}

.jumbotron{background-color: transparent;}

#div-pagination{clear: both;}

.carousel {padding-bottom: 25px}
.carousel img{padding-top: 20px;}
.carousel h2 {color: #0072b5;}
.carousel h2 small{color: #289bde}
.carousel col-lg-4 p {text-align: center;}

/*footer*/
.footer {
    background: #EDEFF1;
    height: auto;
    padding-bottom: 30px;
    position: relative;
    width: 100%;
    border-bottom: 1px solid #CCCCCC;
    border-top: 1px solid #DDDDDD;
}
.footer p {
    margin: 0;
}
.footer h3 {
    border-bottom: 1px solid #BAC1C8;
    color: #54697E;
    font-size: 18px;
    font-weight: 600;
    line-height: 27px;
    padding: 40px 0 10px;
    text-transform: uppercase;
}
.footer ul {
    font-size: 13px;
    list-style-type: none;
    margin-left: 0;
    padding-left: 0;
    margin-top: 15px;
    color: #7F8C8D;
}
.footer ul li a {
    padding: 0 0 5px 0;
    display: block;
}
.footer a {
    color: #78828D
}

.footer-bottom {
    background: #E3E3E3;
    border-top: 1px solid #DDDDDD;
    padding-top: 10px;
    padding-bottom: 10px;
}
.footer-bottom p.pull-left {
    padding-top: 6px;
}
#menu-social-menu li{display: inline-table}

/*footer*/
    </style><div class="container carousel bloco">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner text-center" role="listbox">
                    <div class="item active">
                        <div class="col-lg-8 pull-right">
                            <img src="http://lorempixel.com/g/750/350/transport">
                        </div>
                        <div class="col-lg-4">                            
                            <h2>Sed vel lectus<br>
                                <small>by Merovingio in Jun 22, 2017 at 
                                    21:59</small></h2>
                            <p>
                                Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. 
                                Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. 
                                Pellentesque ipsum. Nulla non arcu lacinia neque faucibus...                            
                                Pellentesque ipsum. Nulla non arcu lacinia neque faucibus... 
                                Pellentesque ipsum. Nulla non arcu lacinia neque faucibus... 
                                Pellentesque ipsum. Nulla non arcu lacinia neque faucibus... 
                            </p>
                          <a class="btn btn-info pull-right" href="/article/show/sed-vel-lectus/9">
                                <i class="fa fa-long-arrow-right"> </i></a>  
                        </div>
                    </div>
                    <div class="item">                    
                        <div class="col-lg-8 pull-right">
                            <img src="http://lorempixel.com/g/750/350/nature">
                        </div>
                        <div class="col-lg-4">                            
                            <h2>Proin porta auctor nisi<br>
                                <small>by Merovingio in Jun 22, 2017 at 
                                    00:34</small></h2>
                            <p>
                                Proin porta auctor nisi in interdum. Praesent a accumsan neque. Quisque ut nulla ac libero egestas tristique. Nunc venenatis elit lorem, ut viverra neque rhoncus a. Proin erat risus, pharetra vitae elementum eget, accumsan ornare mauris.
                                Praesent...                            
                            </p>    
                           <a class="btn btn-info pull-right" href="/article/show/sed-vel-lectus/9">
                                <i class="fa fa-long-arrow-right"> </i></a>  
                        </div>                    
                    </div> 
                    <div class="item">                    
                        <div class="col-lg-8 pull-right">
                            <img src="http://lorempixel.com/g/750/350/fashion">
                        </div>
                        <div class="col-lg-4">                            
                            <h2>Aenean sodales<br>
                                <small>by Merovingio in Jun 22, 2017 at 
                                    00:33</small></h2>
                            <p>
                                Aenean sodales, leo eu euismod tincidunt, felis odio aliquam velit, 
                                quis porta lorem erat eget erat. Aliquam porta libero erat, sed aliquet est 
                                sollicitudin a. Curabitur nec tellus in eros egestas venenatis ac sed nisl. In consectetur nisl eget...                            
                            </p>       
                            <a class="btn btn-info pull-right" href="/article/show/sed-vel-lectus/9">
                                <i class="fa fa-long-arrow-right"> </i></a>                            
                        </div>                    
                    </div> 
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>';
        return $this->addContent;
	}
}
?>