<?php
class panelMessages{
	public $addContent;
	public $panelTitle = '<span class="badge"><span class="glyphicon glyphicon-envelope" style="color:white"></span></span> Mensagens ';
	public $EnviadasText = ' Enviadas <span class="badged"><span class="glyphicon glyphicon-envelope"></span><span class="fa fa-arrow-right" style="color:red"></span></span>';
	public $conversasText = ' Conversas <span class="badged"><span class="fa fa-comments"></span>';
	public $naoLidas = ' Não lidas <span class="badged"><span class="fa fa-envelope"></span>?';
	public function __construct(){

	}
	public function html(){
	$this->addContent = '<div class="panel panel-default" style="margin: 20px"><div class="panel-heading">
            <h3 class="panel-title">'.$this->panelTitle.'</h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        '.$this->naoLidas.'
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-1">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-2" data-toggle="detail-2">
                    <div class="col-xs-10">
                        '.$this->EnviadasText.' 
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-2">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-3" data-toggle="detail-3">
                    <div class="col-xs-10">
                        '.$this->conversasText.'
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-3">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
	</div><script>
$(document).ready(function() {
    $(\'[id^=detail-]\').hide();
    $(\'.toggle\').click(function() {
        $input = $( this );
        $target = $(\'#\'+$input.attr(\'data-toggle\'));
        $target.slideToggle();
    });
});
	</script>';
	return $this->addContent;
	}
}

?>