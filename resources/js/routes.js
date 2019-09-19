import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import login from "./views/login";
import Registro from "./views/Registro";
import Productos from "./views/Productos";
import Comprar from "./views/Comprar";
import Facturas from "./views/Facturas";
import ProductosUsuario from "./views/ProductosUsuario";
import CreaProducto from "./views/CreaProducto";
import Pedidos from "./views/Pedidos";
import ActualizarProducto from "./views/ActualizarProducto";

//Nesasario para la importacion el "Export default"
export default new VueRouter({
    routes: [
        {
            path:"",
            name:"index",
            component: login
        },
        {
            path:"/Registro",
            name:"Registro",
            component: Registro
        },
        {
            path:"/Productos",
            name:"Productos",
            component: Productos
        },
        {
            path:"/Comprar",
            name:"Comprar",
            component: Comprar
        },
        {
            path:"/Facturas",
            name:"Facturas",
            component: Facturas
        },
        {
            path:"/Mis-Productos",
            name:"ProductosUsuario",
            component: ProductosUsuario
        },
        {
            path:"/Crear-Producto",
            name:"CreaProducto",
            component: CreaProducto
        },
        {
            path:"/Pedidos/:idProducto",
            name:"Pedidos",
            component: Pedidos
        },
        {
            path:"/Actualizar-Producto/:idProducto",
            name:"ActualizarProducto",
            component: ActualizarProducto
        }

    ],
    mode:"history"
})
