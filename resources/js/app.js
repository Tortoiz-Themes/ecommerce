/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index';
const store = new Vuex.Store(
    storeData
);

// Vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter)
import {routes} from './routes';
const router = new VueRouter({
    routes,
    mode:'history'
})

// sweet alert
import Swal from 'sweetalert2'
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
});
window.Swal = Swal;
window.confirm_btn = swalWithBootstrapButtons;
window.toast = Toast;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/AdminMaster.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/public/HomeComponent.vue').default);
Vue.component('adminmaster', require('./components/backend/admin/AdminMaster').default);
Vue.component('customermaster', require('./components/backend/customer/CustomerMaster').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
});
