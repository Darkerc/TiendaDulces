<template>
    <div>
        <form class="registroUsuarios" method="POST" id="formRegistro" @submit.prevent="enviarFormulario">
            <legend>Datos del formulario</legend>
            <label>Nombre de la tienda</label>
            <input type="text" placeholder="Nombre Tienda" id="Nombre_Tienda" name="Nombre_Tienda" v-model="Nombre_Tienda"/>

            <label>Contraseña</label>
            <input type="password" placeholder="Contraseña" id="Contrasena" name="Contrasena" v-model="Contrasena"/>

            <label>Confirmar contraseña</label>
            <input type="password" placeholder="Confirmar contraseña" id="confContraseña" name="confContraseña"/>

            <label>Encargado</label>
            <input type="text" placeholder="Encargado" id="Encargado" name="Encargado" v-model="Encargado"/>

            <label>Pais</label>
            <input type="text" placeholder="Pais" id="Pais" name="Pais" v-model="Pais"/>

            <label>Estado</label>
            <input type="text" placeholder="Estado" id="Estado" name="Estado" v-model="Estado"/>

            <label>Colonia</label>
            <input type="text" placeholder="Colonia" id="Colonia" name="Colonia" v-model="Colonia"/>

            <div>
                <input type="submit" value="Enviar" />
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import jquery from "jquery";
import JqueryValidation from "jquery-validation";


    export default {
        data() {
            return {
                Nombre_Tienda:"",
                Contrasena:"",
                Encargado:"",
                Pais:"",
                Estado:"",
                Colonia:""
            }
        },
        mounted() {
            this.initComp();
        },
        methods: {
            initComp(){
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
            },
            enviarFormulario(){
                if($("#formRegistro").valid()){

                    let URL="/api/registro/crearUsuario";
                    let formData=new FormData()
                    formData.append("Nombre_Tienda",this.Nombre_Tienda);
                    formData.append("Contrasena",this.Contrasena);
                    formData.append("Encargado",this.Encargado);
                    formData.append("Pais",this.Pais);
                    formData.append("Estado",this.Estado);
                    formData.append("Colonia",this.Colonia);

                    axios.post(URL,formData)
                    .then(res => {
                    })
                    .catch(err => {
                        console.error(err);
                    })

                }
            }
        },

    }
</script>

<style lang="scss">

.registroUsuarios {
    width: 75%;
    margin: auto auto auto auto;
    height: 75%;
    text-align: left;
    padding: .5em;
    background-color: rgba(#2339bf,0.75);
    color: white;
    border-radius: 20px;

    legend {
        font-size: 40px;
    }

    input {
        width: 100%;
        height: 1.5em;
        padding: 1em;
        box-sizing: border-box;
        margin-top: .5em;
        margin-bottom: 5px;
        border-radius: 5px;
        font-family: 'Comic Sans MS',Cambria, Cochin, Georgia, Times, Times New Roman, sans-serif;
        font-size: medium;
        display: block;

        &:focus {
            box-shadow: 0.4em 0.4em 20px 0 #62f6f1, -0.4em -0.4em 20px 0 #62f6f1, 0.5em -0.4em 20px 0 #62f6f1, -0.4em 0.4em 20px 0 #62f6f1;
        }
    }

    label {
        display: block;
        width: 100%;
        margin-top: 1.5em;
        font-size: 1.2em;
    }

    div {
        display: flex;
        justify-content: center;
        margin-top: 1.5em;
        margin-bottom: 1.5em;

        input {
            background-color: #2339bf;
            height: 2em;
            color: white;
            border-radius: 10px;
            padding: 0;
            box-shadow: 0px 0px 0px 2px #000;
            width: 50%;

            &:active {
                box-shadow: 0px 0px 0px 0px #000;
            }

            &:hover {
                color: gold;
                cursor: pointer;
            }
        }
    }

    .campoErroneo {
        margin-top: 0;
        display: block;
        color: #e61c1c;
    }

    .campoValido {
        color: #21ca00;
    }
}

</style>
