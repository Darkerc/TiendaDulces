<template>
    <!-- <div class="sinRegistro">No existen productos disponibles para comprar</div> -->
    <div class="contenedorProductos">
        <router-link :to="{name: 'Pedidos', params: { idProducto: productos.id } }" v-for="(productos, index) in productosDisponibles" :key="index">
            <legend>
                {{ productos.Nombre_Producto  }}
            </legend>
            <label>
                {{ productos.Precio  }}$
            </label>
            <span>
                {{ productos.Existencias  }} Existencias
            </span>
            <!-- <img src="/images/ProductoImg/{{ productos.tienda__duena.Nombre_Tienda }}/{{ productos.Imagen_Producto }}" > -->
            <img :src="urlImages + productos.tienda__duena.Nombre_Tienda + '/' + productos.Imagen_Producto" />
        </router-link>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        async created() {
            this.comprarProductos();
        },
        data() {
            return {
                productosDisponibles:[],
                urlImages:"/images/ProductoImg/"
            }
        },
        methods: {
            comprarProductos(){
                let URL="./api/productos/disponibles/" + this.$session.get("TIENDA");

                axios.get(URL)
                .then(response => {
                    this.productosDisponibles=response.data
                })
                .catch(e => {
                    console.error(e)
                })
            },
            crearRutas(){

            }
        },
    }
</script>

<style lang="scss" scoped>
    $negroClaro: rgba(#2f2727,.80);

    $azulTraslucido: rgba(#2339bf, .65);

    .contenedorProductos {
        //Disposicion para el grid
        display: grid;
        width: 90%;
        //Autoajuste indicando el minimo de espacio que ocupara cada columna
        grid-template-columns: repeat(auto-fit,minmax(225px,225px));
        //Autoajuste indicando el minimo de espacio que ocupara cada fila
        grid-template-rows: 225px;
        //Filas que no contempla el template
        grid-auto-rows: 225px;
        //Espacio entre cada grid cell
        grid-gap: 10px;
        justify-content: center;
        margin: 1.5em auto 0 auto;

        a,form {
            overflow: hidden;
            position: relative;
            border-radius: 10%;
            transition: all 300ms ease-in-out;
            cursor: pointer;
            display: block;
            box-sizing: border-box;

            &:before {
                content: "";
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                background-color: $negroClaro;
                transition: all 300ms ease-in-out;
            }

            &:hover {
                box-shadow: 0.3em 0.3em 10px 0 #edff00, -0.3em -0.3em 25px 0 #edff00, 0.3em -0.3em 25px 0 #edff00, -0.3em 0.3em 25px 0 #edff00;
                z-index: 2;
                transform: scale(1.2);

                &:before {
                    height: 100%;
                }

                legend {
                    z-index: -1;
                }

                label {
                    z-index: -1;
                    display: none;
                }

                span {
                    transform: translateY(0);
                    z-index: 2;
                }
            }

            &:focus{
                border: 5px solid #2339bf;
            }

            legend {
                text-align: center;
                color: white;
                padding: 5px;
                border-radius: 25px;
                background-color: $azulTraslucido;
                position: absolute;
                top: 10%;
                left: 0;
                //margin: 10% 0;
                width: 100%;
                box-sizing: border-box;
            }

            label {
                text-align: center;
                /*background: linear-gradient(#ffe200,#00b1ff,#ffe200);
                color: transparent;
                -webkit-background-clip: text;
                -moz-background-clip: text;
                -o-background-clip: text;*/
                border-radius: 25px;
                color: white;
                background-color: $azulTraslucido;
                display: block;
                margin: 60% auto 50% auto;
                width: 50%;
            }

            span {
                text-align: center;
                background: linear-gradient(#ffe200,#00b1ff,#ffe200);
                color: transparent;
                background-clip: text;
                -webkit-background-clip: text;
                -moz-background-clip: text;
                -o-background-clip: text;
                position: absolute;
                width: 100%;
                margin: 25% 0;
                transform: translateY(200px);
                transition: all 200ms ease-in-out;
            }

            img {
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }

    ul.pagination{
        list-style: none;
        padding: 0;
        display: flex;
        margin: .5em auto;
        box-sizing: border-box;
        justify-content: center;
        user-select: none;
        font-size: .75em;

        li{
            padding: .2em;
            background-color: #006894;
            color: white;
            border: gold 1px solid;
            margin: .1em;
            cursor: pointer;

            &:hover{
                background-color: #00b3ff;
                color: gold;
            }

            a{
                text-decoration: none;
            }
        }

    }

</style>

