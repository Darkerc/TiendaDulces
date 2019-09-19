require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./app.vue').default);

import router from "./routes.js";
import App from "./App.vue";
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import VueSession from 'vue-session';

Vue.use(VeeValidate)
Vue.use(VueSession)

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router
});
