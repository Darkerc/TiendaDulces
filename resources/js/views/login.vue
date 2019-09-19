<template>
    <div class="formLogin"  @keyup.enter="iniciarSession">
        <legend>Iniciar session</legend>
        <span>Nombre Tienda</span>
        <input type="text" placeholder="Nombre Tienda" id="Nombre_Tienda" name="Nombre_Tienda" v-model="Nombre_Tienda"/>
        <span>Contraseña</span>
        <input type="password" placeholder="Contraseña" id="Contrasena" name="Contrasena" v-model="Contrasena"/>
        <div>
            <input type="submit" value="Acceder" @click="iniciarSession"/>
        </div>
        <div class="generaRegistro">
        <label class="legenda">¿No tienes una cuenta? </label>
        <router-link class="registro" :to="{ name: 'Registro'}">Registrate Aqui</router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import swal from 'sweetalert';
import router from '../routes.js';

    export default {
        beforeCreate() {
            if(this.$session.exists()){
                router.push({
                    name:"Productos"
                })
            }
        },
        data() {
            return {
                Nombre_Tienda:"",
                Contrasena:"",
                Datos_Tienda:[]
            }
        },
        methods: {
            iniciarSession(){
                let URL='./api/login/' + this.Nombre_Tienda + '/' + this.Contrasena;

                if(this.Nombre_Tienda!="" && this.Contrasena!=""){
                    axios.post(URL)
                    .then(response => {
                        if(response.data.Error){
                            alert(response.data.Error)
                        }else{
                            this.Datos_Tienda=response.data;
                            this.$session.start()
                            this.$session.set("TIENDA",this.Datos_Tienda.id)
                            router.push({
                                name:"Productos"
                            });
                        }
                    })
                    .catch(e => {
                        console.log(e);;
                        if(e.response.status==404){
                            swal({
                                title:"Sin conexion",
                                text:"Sin respuesta del servidor",
                                icon:"error",
                                button:"Aceptar",
                                dangerMode:true
                            });

                        }

                    })
                }else{
                    swal({
                        title:"Cuidado",
                        text:"Campos de texto vacios",
                        icon:"warning",
                        button:"Aceptar",
                        dangerMode:true
                    });

                }

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>

