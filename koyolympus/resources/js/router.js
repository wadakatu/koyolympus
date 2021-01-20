import Vue from "vue";
import VueRouter from "vue-router";
import MainMessageComponent from "./components/MainMessageComponent";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            component: MainMessageComponent,
            name: 'main.message'
        },
    ]
});

export default router;
