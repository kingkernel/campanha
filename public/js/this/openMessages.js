function loadMessage(id, nome){
	if(id==""|| id==null){
		alert("É preciso o id de mensagem!");
	};
	$("#msgId"+id).load("/messages/openid/", {idmessage:id, sender:nome});
};