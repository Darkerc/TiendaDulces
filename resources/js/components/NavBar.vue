<template>
    <div>
        <nav class='navegacionPrincipal'>
            <div>Dulces online</div>
            <ul>
                <li>
                    <router-link :to="{ name:'Comprar' }" class="link">Realizar Compra</router-link>
                </li>
                <li>
                    <router-link :to="{ name:'Productos' }" class="link">Productos Totales</router-link>
                </li>
                <li>
                    <router-link :to="{ name:'CreaProducto' }" class="link">Crear Producto</router-link>
                </li>
                <li>
                    <router-link :to="{ name:'Facturas' }" class="link">Mis Facturas</router-link>
                </li>
                <li>
                    <router-link :to="{ name:'ProductosUsuario' }" class="link">Mis Productos</router-link>
                </li>
                <li @click="cerrarSession">
                    <a>Cerrar sesion</a>
                </li>
            </ul>
        </nav>

    </div>
</template>

<script>
import router from '../routes.js';

    export default {
        methods: {
            cerrarSession(){
                this.$session.destroy();
                router.push({
                    name:"index"
                });
            }
        },
    }
</script>

<style lang="scss" scoped>
    .navegacionPrincipal {
        background-color: rgba(#2339bf,0.75);
        font-size: 20px;
        font-family: "comic sans ms",Verdana, Geneva, Tahoma, sans-serif;
        display: flex;
        overflow: auto;
        box-sizing: border-box;
        user-select: none;

        div{
            margin: auto;
            text-align: center;
            color: white;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
            background-color:  #2339bf;
        }

        ul {
            display: flex;
            margin: auto;
            padding: 0;
            height: 100%;

            @media screen and (max-width: 768px) {
                display: none;
            }

            li {
                list-style: none;
                margin: 0;
                height: 100%;


                a, label, .link {
                    transition: all ease-in-out 300ms;
                    color: white;
                    text-decoration: none;
                    padding: 1em .5em;
                    background-color: #2339bf;
                    transition: all 100ms ease-in-out;
                    display: block;
                    cursor: pointer;
                    height: 100%;
                    text-align: center;
                    border-right: gold 1px solid;
                    border-left: gold 1px solid;
                    box-sizing: border-box;

                    &:active {
                        transform: scale(.85);
                    }

                    &:hover {
                        background-color: #2f2727;
                    }
                }

                label.SQL:focus {
                    background-color: red;

                    div.tgSQL {
                        display: block;
                    }
                }

                label.SQL:hover {
                    background-color: red;

                    div.tgSQL {
                        display: block;
                    }
                }

                a:hover {
                    color: gold;
                }
            }
        }
    }
</style>

