require('./bootstrap');

import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Index from "./Index";
import TopNav from "./ui/TopNav";

window.Vue = require('vue').default;
Vue.use(VueRouter);

Vue.component('top-nav', TopNav);

const app = new Vue({
    el: '#app',
    router,
    components: {
        "index": Index,
    }
});
