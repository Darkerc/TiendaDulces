$(document).ready(function(){

'use strict';
	
	$("#formRegistro").validate({
		
		rules:{
			NomTienda:{required:true,maxlength:30},
			Contraseña:{required:true,rangelength:[6,16]},
			confContraseña:{required:true,equalTo:"#Contraseña"},
			Pais:{required:true,maxlength:20},
			Estado:{maxlength:20},
			Colonia:{maxlength:20},
			Encargado:{required:true,maxlength:45}
		},
		
		messages:{
			NomTienda:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 30"},
			Contraseña:{required:"El campo es requerido",rangelength:"La contraseña debe de ser entre 6 y 16 caracteres"},
			confContraseña:{required:"El campo es requerido",equalTo:"Debe ser igual a la contraseña"},
			Pais:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 20"},
			Estado:{maxlength:"La cantidad maxima de caracteres es 20"},
			Colonia:{maxlength:"La cantidad maxima de caracteres es 20"},
			Encargado:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 30"}
		},

		errorClass:"campoErroneo",

		validClass:"campoValido"
	});
});