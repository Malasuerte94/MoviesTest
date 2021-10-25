require('./bootstrap');

import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Index from "./Index";

window.Vue = require('vue').default;
Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
    router,
    components: {
        "index": Index,
    }
});
