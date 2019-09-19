<template>
    <div>
        <form class="creaProducto" method="POST" action="./productos/crear" enctype="multipart/form-data" id="enviaProducto" name="enviaProducto" @submit.prevent="submitForm">

            <label for="NombreProducto" class="input">Nombre del producto: </label>
            <input type="text" name="Nombre_Producto" id="Nombre_Producto" class="input" v-model="Nombre_Producto">

            <label for="Precio" class="input">Precio: </label>
            <input type="text" name="Precio" id="Precio" class="input" v-model="Precio">

            <label for="Existencias" class="input">Existencias: </label>
            <input type="text" name="Existencias" id="Existencias" class="input" v-model="Existencias">

            <div>
                <label for="ImagenProducto" class="input">Subir imagen: </label>
                <label class="nombre" id="NombreImagen" name="NombreImagen">Imagen Producto</label>
            </div>

            <div class="contImagen">
            <div>
                <div>
                <input type="file" name="Imagen_Producto" id="Imagen_Producto" class="input-file" @change="obtenerImagen">

                <span>Insertar Imagen</span>
                </div>
            </div>
            <img src="/images/png/017-sensible.png" name="visualizaImagen" id="visualizaImagen">
            </div>

            <input type="submit" value="Subir Producto" class="submit">

        </form>
    </div>
</template>

<script>

import $ from 'jquery-validation';
import axios from 'axios';
import JQuery from 'jquery';
import router from '../routes';

    export default {
        data() {
            return {
                Nombre_Producto:"",
                Precio:"",
                Existencias:"",
                Imagen_Producto:''
            }
        },
        mounted() {
            this.initComp();
        },
        methods: {
            initComp(){
                'use strict';

                $("#Precio").val(1);

                $("#enviaProducto").validate({
                        rules: {
                            Nombre_Producto: { required: true, maxlength: 30 },
                            Precio: { required: true, number: true, min: 1, max: 1000000 },
                            Existencias: { required: true, number: true, max: 1000000 },
                            Imagen_Producto: { required: true }
                        }, messages: {
                            Nombre_Producto: { required: "El campo es requerido", maxlength: "Longitud maxima de 30 caracteres" },
                            Precio: { required: "El campo es requerido", number: "El campo debe ser numerico", min: "Precio minimo de 1$", max: "Precio maximo permitido de 1000000$" },
                            Existencias: { required: "El campo es requerido", number: "El campo debe ser numerico", max: "Existencias maximas de 1000000" },
                            Imagen_Producto: { required: "El campo es requerido" }
                        }, errorClass: "campoNoValido",
                        validClass: "campoValido"
                });

                $("#Imagen_Producto").change(function (ex) {
                    var archivo = ex.target.files[0].name;  //(this.files[0].name).toString();
                    var leeArchivo = new FileReader();

                    $("#NombreImagen").text("");
                    $("#NombreImagen").text(archivo);

                    leeArchivo.onload = function (e) {
                        $("#visualizaImagen").attr('src', e.target.result);
                    };

                    leeArchivo.readAsDataURL(this.files[0]);
                });
            },
            enviarFormulario(){
                let URL="./productos/crear";
                let dataForm=new FormData();
                dataForm.append("Nombre_Producto",this.Nombre_Producto);
                dataForm.append("Precio",this.Precio);
                dataForm.append("Existencias",this.Existencias);
                dataForm.append("Imagen_Producto",this.Imagen_Producto);
                dataForm.append("Tienda_Id",this.$session.get("TIENDA"));

                axios.post(URL,dataForm, {headers: { "Content-Type": "multipart/form-data" }})
                .then(res => {
                })
                .catch(err => {
                    console.error(err);
                })
            },
            obtenerImagen(e){
                let file=e.target.files[0];
                this.Imagen_Producto=file;
            },
            submitForm(){
                if($("#enviaProducto").valid()){
                    this.enviarFormulario();
                }
            }
        }
    }
</script>

<style lang="scss">
.creaProducto {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    width: 70%;
    margin: 1em auto 1em auto;
    font-size: 30px;
    background-color: rgba(#2339bf,0.75);
    border-radius: 10px;
    padding: 1em;
    box-sizing: border-box;

    label {
        width: 100%;
        display: block;
        height: 1.5em;
        box-sizing: border-box;
        border-radius: 5px;
        font-family: 'Comic Sans MS',Cambria, Cochin, Georgia, Times, Times New Roman, sans-serif;
        font-size: 30px;
        background: linear-gradient(#00b1ff,#ffe200,#00b1ff);
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        -o-background-clip: text;
    }

    div {
        display: flex;
        position: relative;

        label.input {
            width: 35%;
            margin: 0 auto 0 0;
            font-size: 25px;
        }

        label.nombre {
            width: 60%;
            margin: 0 auto;
            font-size: 25px;
            text-align: center;
            overflow-x: auto;
            overflow-y: hidden;
        }
    }

    input.input {
        width: 100%;
        height: 2em;
        padding: 1em;
        box-sizing: border-box;
        border-radius: 5px;
        font-family: 'Comic Sans MS',Cambria, Cochin, Georgia, Times, Times New Roman, sans-serif;
        font-size: medium;

        &:focus {
            box-shadow: 0.4em 0.4em 20px 0 #62f6f1, -0.4em -0.4em 20px 0 #62f6f1, 0.5em -0.4em 20px 0 #62f6f1, -0.4em 0.4em 20px 0 #62f6f1;
        }

        margin: 1.5em auto .5em auto;
    }

    .submit {
        background-color: #2339bf;
        color: white;
        border-radius: 10px;
        padding: 0;
        box-shadow: 0px 0px 0px 2px #000;
        width: 40%;
        font-size: 20px;
        margin: 1.5em auto 1.5em auto;
        font-family: 'Comic Sans MS','Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        &:active {
            box-shadow: 0px 0px 0px 0px #000;
        }

        &:hover {
            color: gold;
            cursor: pointer;
        }
    }

    .contImagen {
        width: 100%;
        display: flex;
        margin: .5em 0 .5em 0;

        div {
            display: flex;
            justify-content: center;
            align-content: center;
            margin: auto;

            div {
                display: flex;
                justify-content: center;
                align-content: center;
                width: 85%;
                height: 30%;
                margin: auto;
                cursor: pointer;
                z-index: 5;
                position: relative;
                background-color: #2339bf;
                color: white;
                border: 2px solid white;
                box-sizing: border-box;
                border-radius: 10px;
                box-shadow: 0px 0px 0px 3px #000;
                font-size: 20px;
                font-family: 'Comic Sans MS','Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

                &:active {
                    box-shadow: 0px 0px 0px 0px #000;
                }

                &:hover {
                    color: gold;
                    cursor: pointer;
                }

                .input-file {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background-color: red;
                    z-index: 100;
                    opacity: 0;
                    cursor: pointer;
                    top: 0;
                    left: 0;
                }

                span {
                    width: 100%;
                    font-size: 25px;
                    text-align: center;
                    cursor: pointer;
                }

                label.campoNoValido {
                    color: #db0c0c;
                    position: absolute;
                    width: 150%;
                    top: 105%;
                    left: -25%;
                    text-align: center;
                    font-size: 25px;
                }

                .campoValido {
                    color: #26aa00;
                }
            }
        }

        img {
            border: solid 5px black;
            border-radius: 10px;
            box-sizing: border-box;
            width: 55%;
            height: 12em;
            margin: auto;
            object-fit: cover;
        }
    }


    .campoNoValido {
        margin: 0 auto 1em auto;
        color: #db0c0c;
    }

    .campoValido {
        color: #26aa00;
    }


}

</style>


