<?php
/**
data de criação: 31/05/2018
Autor: daniel.santos.ap@gmail.com
Ultima Alteração: 31/05/2018
**/
class firebase {
	public $apikey;
	public $authDomain;
	public $databaseURL;
	public $projectId;
	public $storageBucket;
	public $messagingSenderId;

	public function __construct(){

	}
	public function prepare(){
		echo '<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
		<script>
	var config = {
    apiKey: "'.$this->apikey.'",
    authDomain: "'.$this->authDomain.'",
    databaseURL: "'.$this->databaseURL.'",
    projectId: "'.$this->projectId.'",
    storageBucket: "'.$this->storageBucket.'",
    messagingSenderId: "'.$this->messagingSenderId.'"
  	};
  	firebase.initializeApp(config);
	</script>';
	}
}

?>