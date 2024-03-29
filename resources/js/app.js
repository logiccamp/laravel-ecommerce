/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


import Vue from 'vue';
import VueToaster from 'vue-toastr';
Vue.use(VueToaster)

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
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('add-to-cart', require('./components/AddToCart.vue').default);
Vue.component('login-popup', require('./components/LoginPopup.vue').default);
Vue.component('added-cart', require('./components/AddedCart.vue').default);
Vue.component('shop', require('./components/Shop.vue').default);
Vue.component('categories', require('./components/Categories.vue').default);
Vue.component('loader', require('./components/Loader.vue').default);
Vue.component('shop-page', require('./components/ShopPage.vue').default);
Vue.component('cart-page', require('./components/CartPage.vue').default);
Vue.component('checkout', require('./components/CheckOut.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
