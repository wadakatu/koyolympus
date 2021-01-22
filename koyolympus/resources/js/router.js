import Vue from "vue";
import VueRouter from "vue-router";
import MainMessageComponent from "./components/MainMessageComponent";
import MainCardComponent from "./components/MainCardComponent";
import AboutMeComponent from "./components/AboutMeComponent";
import AboutMeEnglishComponent from "./components/AboutMeEnglishComponent";

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
            name: 'main'
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
        }
    ]
});

export default router;
