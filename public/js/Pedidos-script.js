$(document).ready(function(){
	'use strict';

	var nPedidos=1;
	
	$("#pedido").html("<span>" + nPedidos + "</span>");
	
	$("#nPedido").val(nPedidos);
	
	$("#aumenta").click(function(e){
		
		nPedidos++;
		
		if(nPedidos<=1){ nPedidos=1; }
		
		$("#nPedido").val(nPedidos);
		
		console.log(nPedidos);
		
		$("#pedido").empty();
		
		$("#pedido").html("<span>" + nPedidos + "</span>");

		e.preventDefault();
		
	});
	
	$("#disminuye").click(function(e){
		
		nPedidos--;
		
		if(nPedidos<=1){ nPedidos=1; }
		
		$("#nPedido").val(nPedidos);
		
		console.log(nPedidos);
		
		$("#pedido").empty();
		
		$("#pedido").html("<span>" + nPedidos + "</span>");

		e.preventDefault();
		
	});
	
	$("#nPedido").change(function(e){
		
		var ultimoValor=nPedidos;
		
		try{
			
			nPedidos=$(this).val();
			
			$("#pedido").empty();
		
			$("#pedido").html("<span>" + nPedidos + "</span>");
			
		}catch(Exception){
			
			nPedidos=ultimoValor;
			
			$(this).val(ultimoValor);
			
			$("#pedido").html("<span>" + ultimoValor + "</span>");
		}
		e.preventDefault();
		
	});

	$("#formProducto").validate({
		
		rules:{
			nPedido:{required:true,number:true,min:1,max:10000}
		},
		
		messages:{
			nPedido:{required:"No puede quedar vacio",number:"Debe ser un numero",min:"Minimo a un producto",max:"El maximo de pedidos es 10000"}
		},

		errorClass:"noAdmitido",

		validClass:"admitido",

		errorLabelContainer:contError
	});

});