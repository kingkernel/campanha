$("#msgbtn").click(function(){
	var conteudo = CKEDITOR.instances.editor1.getData();
	var receiver = $("#pessoa").val();
	var iduser = "@sessiondados";
	if(conteudo=='' || conteudo == null){
		alert("É preciso digitar algo!");
		return false;
	}
	$("#result").load("../post/", {
		a:conteudo,
		b:receiver,
		c:iduser,
		d:"individual"})
});