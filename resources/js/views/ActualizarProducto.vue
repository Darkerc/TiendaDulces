<template>
    <div>
        <form @submit.prevent="actualizarProducto" method="PUT" :action="`/api/productos/actualizar/${this.$route.params.idProducto}/${this.$session.get('TIENDA')}`" class="creaProducto" enctype="multipart/form-data" id="actualizaProducto" name="actualizaProducto">

            <label for="NombreProducto" class="input">Nombre del producto: </label>
            <input type="text" name="Nombre_Producto" id="Nombre_Producto" class="input" v-model="Nombre_Producto">

            <label for="Precio" class="input">Precio: </label>
            <input type="text" name="Precio" id="Precio" class="input" v-model="Precio">

            <label for="Existencias" class="input">Existencias: </label>
            <input type="text" name="Existencias" id="Existencias" class="input" v-model="Existencias">

            <div>
            <label for="ImagenProducto" class="input">Subir imagen: </label>
            <label class="nombre" id="NombreImagen" name="NombreImagen">{{ datosProducto.Imagen_Producto }}</label>
            </div>

            <div class="contImagen">
            <div>
                <div>
                <input type="file" name="Imagen_Producto" id="Imagen_Producto" class="input-file"  @change="obtenerImagen">
                <span>Insertar Imagen</span>
                </div>
            </div>
            <img :src="urlImage" name="visualizaImagen" id="visualizaImagen">
            </div>

            <input type="submit" value="Subir Producto" class="submit">
        </form>

    </div>
</template>

<script>
import jquery from 'jquery';
import jqueryvalidate from 'jquery-validation';
import axios from "axios";

    export default {
        data() {
            return {
                datosProducto:[],
                urlImage:"",
                Nombre_Producto:"",
                Precio:"",
                Existencias:"",
                Imagen_Producto:''
            }
        },
        mounted() {
            this.initComp();
            this.obtenerDatos();
        },
        methods: {
            initComp(){
                'use strict';

                $("#actualizaProducto").validate({
                    rules: {
                        Nombre_Producto: { required: true, maxlength: 30 },
                        Precio: { required: true, number: true, min: 1, max: 1000000 },
                        Existencias: { required: true, number: true, max: 1000000 }
                    }, messages: {
                        Nombre_Producto: { required: "El campo es requerido", maxlength: "Longitud maxima de 30 caracteres" },
                        Precio: { required: "El campo es requerido", number: "El campo debe ser numerico", min: "Precio minimo de 1$", max: "Precio maximo permitido de 1000000$" },
                        Existencias: { required: "El campo es requerido", number: "El campo debe ser numerico", max: "Existencias maximas de 1000000" }
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
            obtenerDatos(){
                let URL=`/api/productos/pedido/${this.$route.params.idProducto}`;

                axios.get(URL)
                .then(res => {
                    this.datosProducto=res.data

                    this.urlImage=`../images/ProductoImg/${this.datosProducto.tienda__duena.Nombre_Tienda}/${this.datosProducto.Imagen_Producto}`;
                    this.Nombre_Producto=this.datosProducto.Nombre_Producto;
                    this.Precio=this.datosProducto.Precio;
                    this.Existencias=this.datosProducto.Existencias;
                })
                .catch(err => {
                    console.error(err);
                })


            },
            actualizarProducto(){
                if($("#actualizaProducto").valid()){
                    let URL=`/api/productos/actualizar/${this.$route.params.idProducto}/${this.$session.get("TIENDA")}`;
                    let dataForm=new FormData();
                    dataForm.append("Nombre_Producto",this.Nombre_Producto);
                    dataForm.append("Precio",this.Precio);
                    dataForm.append("Existencias",this.Existencias);

                    var file = document.getElementById("Imagen_Producto").files[0];

                    if(file){
                        dataForm.append("Imagen_Producto",this.Imagen_Producto);
                    }

                    axios.post(URL,dataForm,{headers: { "Content-Type": "multipart/form-data" }})
                    .then(res => {
                        console.log(res)

                    })
                    .catch(err => {
                        console.error(err);
                    })
                }
            },
            obtenerImagen(e){
                let file=e.target.files[0];
                this.Imagen_Producto=file;
            }
        },

    }
</script>

<style lang="scss">

</style>

