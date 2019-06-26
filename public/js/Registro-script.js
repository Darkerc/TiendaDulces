$(document).ready(function(){

'use strict';

	$("#formRegistro").validate({

		rules:{
			Nombre_Tienda:{required:true,maxlength:30},
			Contrasena:{required:true,rangelength:[6,16]},
			confContraseña:{required:true,equalTo:"#Contrasena"},
			Pais:{required:true,maxlength:20},
			Estado:{maxlength:20},
			Colonia:{maxlength:20},
			Encargado:{required:true,maxlength:45}
		},

		messages:{
			Nombre_Tienda:{required:"El campo es requerido",maxlength:"La cantidad maxima de caracteres es 30"},
			Contrasena:{required:"El campo es requerido",rangelength:"La contraseña debe de ser entre 6 y 16 caracteres"},
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
