function @nameFunction(){
	$.notify({
		message: '@message'
			},
			{ type: '@type',
			 delay: 2500,
			 animate: {enter: 'animated fadeInDown',
			 exit: 'animated fadeOutUp'
			},
		allow_dismiss:true });
};