<?php
class debug {
	public function __construct(){

	}
	public function index(){
		$pagina = new page_site;
		$pagina->headersinclude = '<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
<script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>';
		
		$pagina->bodycontent = '<ons-page>
  <ons-toolbar>
    <div class="center">KCamp</div>
  </ons-toolbar>

  <ons-tabbar swipeable position="auto">
    <ons-tab page="tab1.html" label="Tab 1" icon="md-face", material:md-home" badge="2" active>
    </ons-tab>
    <ons-tab page="tab2.html" label="Tab 2" icon="md-settings" active-icon="md-face">
    </ons-tab>
  </ons-tabbar>
</ons-page>

<template id="tab1.html">
  <ons-page id="Tab1">
    <p style="text-align: center;">
      primeira pagina
    </p>
  </ons-page>
</template>

<template id="tab2.html">
  <ons-page id="Tab2">
    <p style="text-align: center;">
      Segunda pagina
    </p>
  </ons-page>
</template>';
		$pagina->scriptsendpage = '';
		$pagina->render();
		;
	}
}
?>