
	
	Vue.component('navegacion', {
		template:`
		<nav class='navegacionPrincipal'>
		<ul>
			<li>
				<a href='../Controlador/Comprar-Controlador.php'>Comprar</a>
			</li>
			<li>
				<a href='../Controlador/Productos-Controlador.php'>Productos</a>
			</li>
			<li>
				<a href='../Controlador/CreaProducto-Controlador.php'>Crear Producto</a>
			</li>
			<li>
				<a href='../Controlador/MisFacturas-Controlador.php'>Mis Facturas</a>
			</li>
			<li>
				<a href='../Modelo/CerrarSession.php'>Cerrar Session</a>
			</li>
		</ul>
	  </nav>
		`
	})
	
	Vue.component('pie', {
		template:` 
		<footer class="footer">
			<ul>
				<li><a href="#" class="icon-google"></a><label>Google</label></li>
				<li><a href="#" class="icon-facebook2"></a><label>Facebook</label></li>
				<li><a href="#" class="icon-twitter"></a><label>twitter</label></li>
			</ul>
		</footer>
		`
	})

	new Vue({
		el:'#app'
	});

	$("#btnSql").click(function(){

		$("#mostrarSql").toggleClass("tgSQL");

	});

	
	


