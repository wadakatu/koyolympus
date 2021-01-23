import Vue from "vue";
import VueRouter from "vue-router";
import MainMessageComponent from "./components/MainMessageComponent";
import MainCardComponent from "./components/MainCardComponent";
import BizInquiriesComponent from "./components/BizInquiriesComponent";

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
            name: 'main.message'
        },
        {
            path: '/bizinq',
            components: {
                default: BizInquiriesComponent,
                card: MainCardComponent,
            },
            name: 'main.biz'
        },
    ]
});

export default router;
