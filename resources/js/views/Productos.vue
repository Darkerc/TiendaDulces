<template>
<div>
    <div class="tablaProductos">
        <table class="tbResponsive">
            <thead>
                <tr>
                    <th>Codigo Producto</th>
                    <th>Nombre del producto</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(producto, index) in datosProductos" :key="index">
                    <td> {{ producto.id }} </td>
                    <td> {{ producto.Nombre_Producto }} </td>
                    <td> {{ producto.Precio }} </td>
                    <td> {{ producto.Existencias }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
import axios from 'axios'


    export default {
        async created() {
            this.obtenerProductos();
        },
        data() {
            return {
                datosProductos:[]
            }
        },
        methods: {
            obtenerProductos(){
                let URL = "./api/productos/all"

                axios.get(URL)
                .then(response => {
                    this.datosProductos=response.data
                })
                .catch()
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
    text-align:center;

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
            text-align:center;

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

                    a.actualizar{
                        text-decoration: none;
                        color: white;
                        display: block;
                        box-sizing: border-box;
                        padding: .1em;
                        background-color: rgb(0, 180, 0);
                    }

                    a.eliminar{
                        text-decoration: none;
                        color: white;
                        display: block;
                        box-sizing: border-box;
                        padding: .1em;
                        background-color: rgb(180, 0, 0);
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
