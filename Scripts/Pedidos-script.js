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
	
	
	
	
	
});