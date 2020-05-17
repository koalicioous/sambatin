/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Vue-Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    { path: '/dashboard', component:require('./components/dashboard/main.vue').default},
    { path: '/kategori', component:require('./components/dashboard/kategori.vue').default},
    { path: '/pesan', component:require('./components/dashboard/pesan.vue').default},
    { path: '/sambat', component:require('./components/dashboard/sambat.vue').default},
    { path: '/respon', component:require('./components/dashboard/respon.vue').default},
    { path: '/users', component:require('./components/dashboard/user.vue').default},
    { path: '/roles', component:require('./components/dashboard/roles.vue').default},

]

const router = new VueRouter({
    mode:'history',
    routes
})

//Element UI
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/id';

Vue.use(ElementUI,{locale});

//Sweet Alert
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
  })
  
  window.Swal = Swal;
  window.Toast = Toast;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
