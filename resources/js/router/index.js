import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import Upload from "../pages/Upload.vue";
import Login from "../pages/Login.vue";
import Moderation from "../pages/Moderation.vue";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", name: "home", component: Home },
        { path: "/upload", name: "upload", component: Upload },
        { path: "/login", name: "login", component: Login },
        { path: "/moderation", name: "moderation", component: Moderation },
    ],
});
