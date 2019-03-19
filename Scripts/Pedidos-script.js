const app=new Vue({
	el:'#app',
	data:{
		pedido:0
	},
	methods:{
		aumentarPedido(){
			this.pedido++;
		},

		disminuyePedido(){
			if(this.pedido<=0){
				this.pedido=0;
			}else{
				this.pedido--;
			}
		}
	}



});