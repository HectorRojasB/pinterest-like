import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import Login from "../pages/Login.vue";
import Upload from "../pages/Upload.vue";
import Discover from "../pages/Discover.vue";
import Favorites from "../pages/Favorites.vue";
import Moderation from "../pages/Moderation.vue";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", name: "home", component: Home },
        { path: "/upload", name: "upload", component: Upload },
        { path: "/login", name: "login", component: Login },
        { path: "/moderation", name: "moderation", component: Moderation },
        { path: "/favorites", name: "favorites", component: Favorites },
        { path: "/discover", name: "discover", component: Discover },
    ],
});
