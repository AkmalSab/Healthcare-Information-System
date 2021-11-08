require('./bootstrap');

window.Vue = require('vue').default;
import Vue from "vue";
import VueRouter from "vue-router";
import {routes} from "./routes"

import vSelect from 'vue-select'
import moment from 'moment'

Vue.use(VueRouter);
Vue.component('example-component', require('./components/pms/Index.vue').default);
Vue.component('v-select', vSelect);

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('Do MMMM YYYY, h:mm A')
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});
