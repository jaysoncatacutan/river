
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
import DatePicker from 'vue2-datepicker';

Vue.use(DatePicker);
Vue.use(BootstrapVue);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('bookings', require('./components/Bookings.vue'));
Vue.component('navbar', require('./components/commons/NavBar.vue'));
Vue.component('bottom', require('./components/commons/Footer.vue'));
Vue.component('banner', require('./components/commons/Hero.vue'));
Vue.component('banner2',require('./components/ContactHero.vue'));
Vue.component('introduction',require('./components/Introduction.vue'));
Vue.component('contactinfo',require('./components/ContactInfo.vue'));



const app = new Vue({
    el: '#app'
});

const footer = new Vue({
    el: '#footer'
})