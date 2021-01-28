/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import Vue from 'vue';
import router from './router';
import store from './store';
import BackgroundImage from "./components/BackgroundImageComponent";
import HeaderComponent from "./components/HeaderComponent";
import FooterComponent from "./components/FooterComponent";
import MainCardComponent from "./components/MainCardComponent";
import PhotoUploadComponent from "./components/PhotoUploadComponent";
import BizInquiriesComponent from "./components/BizInquiriesComponent";

require('./bootstrap');


window.Vue = require('vue');


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
Vue.component('background-image-component', BackgroundImage)
Vue.component('header-component', HeaderComponent)
Vue.component('footer-component', FooterComponent)
Vue.component('main-card-component', MainCardComponent)
Vue.component('biz-inquiries-component', BizInquiriesComponent)
Vue.component('photo-upload-component', PhotoUploadComponent)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const createApp = async () => {
    await store.dispatch('auth/currentUser');


    const app = new Vue({
        el: '#app',
        router: router,
        store
    })
}

createApp()
