<template>
    <div>
        <div v-if="!exitenDatos" class="sinRegistro">No se a realizado ninguna compra</div>
        <div class="muestraFactura" v-if="exitenDatos">
            <ul class="listaFacturas">
                <li class="itemFactura"  v-for="(factura, index) in datosFacturas" :key="index">
                <a target="_blank" class="link" :href="urlFactura + factura.id">
                    <button class="impFactura" id="btnImprimir">Imprimir</button>
                </a>
                <label for="btnImprimir" class="lbFactura">
                    <span class="folio">Folio #{{ factura.id }}</span>
                    <span>Dia: {{ moment(new Date(factura.Fecha_Compra)).date()  }}</span>
                    <span>Mes: {{ moment(new Date(factura.Fecha_Compra)).month()  }}</span>
                    <span>Año: {{ moment(new Date(factura.Fecha_Compra)).year() }}</span>
                    <legend>{{ factura.producto.Nombre_Producto }}</legend>
                </label>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';

    export default {
        async created() {
            this.obtenerFacturas();
        },
        data() {
            return {
                exitenDatos:false,
                datosFacturas:[],
                urlFactura:"./factura/imprimir/",
            }
        },
        methods: {
            obtenerFacturas(){
                let URL="./api/facturas/usuario/" + this.$session.get("TIENDA");

                axios.get(URL)
                .then(response => {
                    this.datosFacturas=response.data
                    if(response.data.length>0){
                        this.exitenDatos=true;
                    }
                }).catch()
            },
            moment(date) {
                return moment(date);
            }
        },

    }
</script>

<style lang="scss" scoped>
.muestraFactura{
    background-color: rgba(#2339bf,0.75);
    border-radius: 10px;
    padding: 1em;
    margin: 0 auto;
    height: 100%;
    width: 85%;
    box-sizing: border-box;

    .tituloFactura{
        width: 75%;
        margin: 0 auto;
        font-size: 30px;
        text-align: center;
        background: linear-gradient(#00b1ff,#ffe200,#00b1ff);
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        -o-background-clip: text;

    }

    .listaFacturas{
        font-size: 20px;
        // height: 30px;
        padding: 0;

        .itemFactura{
            list-style: none;
            display: flex;
            // height: 100%;
            // overflow: auto;
            .link{
                display: block;
                margin: auto 2.5% auto 2.5%;

                .impFactura{
                    background-color: #2339bf;
                    color: white;
                    border-radius: 10px;
                    padding: .5em 1em;
                    box-shadow: 0px 0px 0px 2px #000;
                    font-family: "Comic sans ms",Arial, Helvetica, sans-serif;
                    font-size: 15px;
                    font-weight: 100;
                    width: 125px;

                    &:active {
                        box-shadow: 0px 0px 0px 0px #000;
                    }

                    &:hover {
                        color: gold;
                        cursor: pointer;
                    }
                }
            }

            .lbFactura{
                margin: 0 auto;
                margin-left: 15%;
                background: linear-gradient(#00b1ff,#ffe200,#00b1ff);
                color: transparent;
                background-clip: text;
                -webkit-background-clip: text;
                -moz-background-clip: text;
                -o-background-clip: text;
                overflow: auto;
                text-align: center;
            }

        }
    }
}
</style>

