<template>
    <div>
        <div class="sinRegistro" v-if="!exitenDatos">No ha subido ningun producto</div>
        <div class="tablaProductos" v-if="exitenDatos">
            <table class="tbResponsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(productos, index) in datosProductos" :key="index">
                        <td>{{ productos.id }}</td>
                        <td>{{ productos.Nombre_Producto }}</td>
                        <td>{{ productos.Precio }}$</td>
                        <td>{{ productos.Existencias }}</td>
                        <td><router-link class="actualizar" :to="`/Actualizar-Producto/${productos.id}`">Actualizar</router-link></td>
                        <td><a @click="eliminarProducto(productos)" class="eliminar">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import swal from 'sweetalert';

    export default {
        async created() {
            this.obtenerProductos();
        },
        data() {
            return {
                exitenDatos:false,
                datosProductos:[]
            }
        },
        methods: {
            obtenerProductos(){
                let URL="./api/productos/leer/" + this.$session.get("TIENDA");

                axios.get(URL)
                .then(res => {
                    this.datosProductos=res.data
                })
                .catch(err => {
                    console.error(err);
                })
            },
            eliminarProducto(producto){
                swal({
                title: `¿Esta seguro de eliminar ${producto.Nombre_Producto}?`,
                text: "Una ves eliminado no se podra restaurar el producto",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    let URL="../api/productos/eliminar/" + producto.id;

                    axios.delete(URL)
                    .then(res => {
                        if(res.data.length>0){
                        this.exitenDatos=true;
                    }
                    })
                    .catch(err => {
                        console.error(err);
                    })

                    //Permite obtener la row y eliminarla del dom de manera que
                    //se aprecie que se a eliminado un registro
                    const idx = this.datosProductos.indexOf(producto)
                    this.datosProductos.splice(idx, 1)

                    swal("Producto Eliminado", {
                    icon: "success",
                    });
                } else {
                    swal("Producto no eliminado");
                }
                });
            }
        },

    }
</script>

<style lang="scss" scoped>

$greenColor: rgb(80, 238, 59);

.tablaProductos {
    margin: auto;
    overflow-x: auto;
    width: 95%;

    .tbResponsive {
        min-width: 1000px;
        overflow: auto;
        border-collapse: collapse !important;
        margin: auto;
        background: rgba(#3c3333,0.5) !important;
        color: white;
        font-size: 20px;
        border: solid 2px #2f2828;
        box-sizing: border-box;

        thead {
            padding: 0;

            th:first-child {
                width: 8em;
            }

            tr {
                display: table-row;
                background-color: #3c3333;
                border: 3px solid #3c3333;
            }

            td {
                border: 3px solid #3c3333;
                text-align: center;
            }
        }

        tbody {
            padding: 0;
            position: relative;

            tr {
                background-color: #635252;

                td:first-child {
                    position: absolute;
                    background-color: #635252;
                    width: 8em;
                }

                td {
                    border: 3px solid #3c3333;
                    text-align: center;

                    a.actualizar,.actualizar{
                        text-decoration: none;
                        color: white;
                        display: block;
                        box-sizing: border-box;
                        padding: .1em;
                        background-color: rgb(0, 180, 0);
                        user-select: none;
                        cursor: pointer;

                        &:hover{
                            background-color: rgb(0, 230, 0);
                        }

                    }

                    a.eliminar,.eliminar{
                        text-decoration: none;
                        color: white;
                        display: block;
                        box-sizing: border-box;
                        padding: .1em;
                        background-color: rgb(180, 0, 0);
                        user-select: none;
                        cursor: pointer;

                        &:hover{
                            background-color: rgb(230, 0, 0);
                        }
                    }

                }
            }
        }

        tr:hover {
            td:first-child {
                background-color: #223e8b;
                color: white;
            }
        }
    }
}

</style>
