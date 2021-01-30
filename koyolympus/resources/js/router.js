import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";
import MainMessageComponent from "./components/MainMessageComponent";
import MainCardComponent from "./components/MainCardComponent";
import AboutMeComponent from "./components/AboutMeComponent";
import AboutMeEnglishComponent from "./components/AboutMeEnglishComponent";
import AboutMeFrenchComponent from "./components/AboutMeFrenchComponent";
import AboutMeKoreanComponent from "./components/AboutMeKoreanComponent";
import AboutMeChineseComponent from "./components/AboutMeChineseComponent";
import BizInquiriesComponent from "./components/BizInquiriesComponent";
import PhotoUpComponent from "./components/PhotoUpComponent";
import LoginComponent from "./components/LoginComponent";
import SystemError from './pages/errors/CommonErrorComponent';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            components: {
                default: MainMessageComponent,
                card: MainCardComponent
            },
            name: 'main',
        },
        {
            path: '/aboutme',
            components: {
                default: AboutMeComponent,
                card: MainCardComponent,
            },
            name: 'about.me',
        },
        {
            path: '/aboutme/english',
            components: {
                default: AboutMeEnglishComponent,
                card: MainCardComponent,
            },
            name: 'about.me.english'
        },
        {
            path: '/aboutme/french',
            components: {
                default: AboutMeFrenchComponent,
                card: MainCardComponent,
            },
            name: 'about.me.french',
        },
        {
            path: '/aboutme/korean',
            components: {
                default: AboutMeKoreanComponent,
                card: MainCardComponent,
            },
            name: 'about.me.korean',
        },
        {
            path: '/aboutme/chinese',
            components: {
                default: AboutMeChineseComponent,
                card: MainCardComponent,
            }
        },
        {
            path: '/bizinq',
            components: {
                default: BizInquiriesComponent,
                card: MainCardComponent,
            },
            name: 'main.biz'
        },
        {
            path: '/upload',
            components: {
                default: PhotoUpComponent,
                card: MainCardComponent,
            },
            name: 'photo.upload',
            beforeEnter(to, from, next) {
                if (store.getters['auth/check']) {
                    next();
                } else {
                    next('/login')
                }
            }
        },
        {
            path: '/login',
            components: {
                default: LoginComponent,
                card: MainCardComponent,
            },
            name: 'login',
            beforeEnter(to, from, next) {
                if (store.getters['auth/check']) {
                    next('/upload');
                } else {
                    next();
                }
            }
        },
        {
            path: '*',
            components: {
                default: SystemError,
            },
        }
    ]
});

export default router;
