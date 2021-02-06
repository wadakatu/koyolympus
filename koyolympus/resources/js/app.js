/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import Vue from 'vue';
import router from './router';
import store from './store';
import VueStar from 'vue-star'
import Lightbox from "luminous-lightbox/lib/Lightbox";
import BackgroundImage from "./components/BackgroundImageComponent";
import HeaderComponent from "./components/HeaderComponent";
import FooterComponent from "./components/FooterComponent";
import MainCardComponent from "./components/MainCardComponent";
import PhotoUploadComponent from "./components/PhotoUploadComponent";
import BizInquiriesComponent from "./components/BizInquiriesComponent";
import {INTERNAL_SERVER_ERROR} from "./util";

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
Vue.component('VueStar', VueStar);
Vue.component('lightbox', Lightbox);

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
        store,
    })
}

export default {
    mounted: function () {
        this.$refs.ThumbsUp.$data.active = true;
        console.log(this.$refs.ThumbsUp.$data);
    },
    computed: {
        errorCode() {
            return this.$store.state.error.code;
        }
    },
    watch: {
        errorCode: {
            handler(val) {
                if (val === INTERNAL_SERVER_ERROR) {
                    this.$router.push('/error');
                }
            },
            immediate: true
        },
        $route() {
            this.$store.commit('error/setCode', null);
        }
    }
}


createApp()
