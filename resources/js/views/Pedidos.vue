<template>
    <div>
        <div class="productoPedido" >
            <img :src="urlImage">
            <form method="post" id="formProducto" name="formProducto" @submit.prevent="crearFactura">
                <label>{{ datosProducto.Nombre_Producto }}</label>
                <span>ID: {{ datosProducto.id }}</span>
                <span>Existencas: {{ datosProducto.Existencias }}</span>
                <span>Precio: {{ datosProducto.Precio }}</span>
                <div>
                <label>N.Pedido:</label>
                <label id="pedido" name="pedido"></label>
                <input type="text" name="nPedido" id="nPedido">
                <button id="aumenta" name="aumenta">+</button>
                <button id="disminuye" name="disminuye">-</button>
                </div>
                <input type="submit" value="Enviar pedido" id="enviaProducto" name="enviaProducto">
            </form>
        </div>
        <label id="contError"></label>
    </div>
</template>

<script>
import $ from 'jquery-validation';
import axios from 'axios';
import JQuery from 'jquery';
import router from '../routes';
import swal from 'sweetalert';

    export default {
        data() {
            return {
                datosProducto:[],
                urlImage:"",
                numPedido:1
            }
        },
        async created() {
            this.obtenerDatosProducto()
        },
        mounted() {
            this.obtenerDatosProducto()
            this.initComp()
        },
        methods: {
            obtenerDatosProducto(){
                let URL="/api/productos/pedido/" + this.$route.params.idProducto;
                axios.get(URL)
                .then(res => {
                    this.datosProducto=res.data
                    //!!Importante!!
                    //Se declara el urlImage aqui ya que si se hace un v-model en la misma linea src
                    //puede crear un error al no encontrar las propiedades en datosProducto
                    this.urlImage="/images/ProductoImg/" + this.datosProducto.tienda__duena.Nombre_Tienda + "/" + this.datosProducto.Imagen_Producto;
                })
                .catch(err => {
                    console.error(err);
                })
            },
            initComp(){
                'use strict';

                var nPedidos=this.numPedido;

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

                    errorLabelContainer:"#contError"
                });

            },
            crearFactura(){
                let URL="../api/productos/pedido/crear/" + this.$session.get("TIENDA") +"/" + this.$route.params.idProducto;

                axios.post(URL)
                .then(res =>{
                    router.push({
                        name:"Comprar"
                    })
                }).catch(err => {
                    console.log(err)
                    if(err.response.status==404){
                        swal({
                            title:"Sin conexion",
                            text:"Sin respuesta del servidor",
                            icon:"error",
                            button:"Aceptar",
                            dangerMode:true
                        });
                    }
                    else if(err.response.status==500){
                        swal({
                            title:"Error en el servidor",
                            text:"Intentenlo mas tarde",
                            icon:"error",
                            button:"Aceptar",
                            dangerMode:true
                        });
                    }else{
                        swal({
                            title:"A ocurrido un problema",
                            text:"Intentelo mas tarde",
                            icon:"warning",
                            button:"Aceptar",
                            dangerMode:true
                        });
                    }
                })
            }
        },

    }

</script>

<style lang="scss" scope>

.productoPedido {
    display: flex;
    margin: 50px auto 0 auto;
    background-color: rgba(#2339bf,0.75);
    width: 85%;
    padding: 60px 20px;
    border-radius: 50px;

    img {
        display: block;
        width: 45%;
        height: 350px;
        margin: 0 2.5%;
        border-radius: 20px;
        object-fit: cover;
        box-sizing: border-box;
        border: solid 5px black;
        transition: all 200ms ease-in-out;

        &:hover {
            transform: scale(1.05);
        }
    }

    div, form {
        width: 45%;
        margin: 0 2.5%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        position: relative;

        label {
            display: block;
            text-align: center;
            margin: auto;
            background: linear-gradient(#ffe200,#00b1ff,#ffe200);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -o-background-clip: text;
        }

        span {
            display: block;
            margin: auto auto auto 0;
            background: linear-gradient(#00b1ff,#ffe200,#00b1ff);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -o-background-clip: text;
        }

        input {
            display: block;
            width: 100%;
            height: 35px;
            background-color: #2339bf;
            color: white;
            border-radius: 10px;
            padding: 0;
            box-shadow: 0px 0px 0px 2px #000;
            margin: 0;
            font-size: 25px;
            text-align: center;

            &:active {
                box-shadow: 0px 0px 0px 0px #000;
            }

            &:hover {
                color: gold;
                cursor: pointer;
            }
        }

        div {
            display: flex;
            flex-direction: row;
            width: 100%;
            margin: auto 0 auto 0;

            button {
                display: block;
                width: 50px;
                height: 50px;
                background-color: #2339bf;
                color: white;
                border-radius: 10px;
                padding: 0;
                box-shadow: 0px 0px 0px 2px #000;
                margin: 0;
                font-size: 30px;

                &:active {
                    box-shadow: 0px 0px 0px 0px #000;
                }

                &:hover {
                    color: gold;
                    cursor: pointer;
                }
            }

            label {
                margin: 0;
                display: block;
                text-align: left;
            }

            input {
                display: block;
                width: 50px;
                margin: auto 0;
                height: 30px;
                padding: .3em;
                color: black;
                background-color: white;
                box-sizing: border-box;
                border-radius: 5px;
                font-size: medium;
                font-family: 'Comic Sans MS',Cambria, Cochin, Georgia, Times, Times New Roman, sans-serif;

                &:focus {
                    cursor: text;
                    box-shadow: 0.4em 0.4em 20px 0 #62f6f1, -0.4em -0.4em 20px 0 #62f6f1, 0.5em -0.4em 20px 0 #62f6f1, -0.4em 0.4em 20px 0 #62f6f1;
                }

                &:hover {
                    cursor: text;
                    color: black;
                }
            }

            label.noAdmitido,label.admitido{
                text-align: center;
                display: block;
                background-color: rgba(#2339bf,0.75);
                width: 75%;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 50px;
            }

            label.noAdmitido{
                color: #f11717;
            }

            label.admitido{
                color: #17dd42;
            }
        }
    }
}

label.noAdmitido,label.admitido,#contError{
    text-align: center;
    display: block !important;
    background-color: rgba(#2339bf,0.75);
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 50px;
}

label.noAdmitido{
    color: #f11717;
}

label.admitido{
    color: #17dd42;
}


</style>
