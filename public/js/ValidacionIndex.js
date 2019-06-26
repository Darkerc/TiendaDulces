$(document).ready(function(){

'use strict';
	
	$("#LoginForm").validate({
		
		rules:{
			Tienda:{required:true,maxlength:30},
			Encargado:{required:true,maxlength:45}
		},
		
		messages:{
			Tienda:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 30"},
			Encargado:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 45"}
		},

		errorClass:"campoErroneo",

		validClass:"campoValido"
	});
});