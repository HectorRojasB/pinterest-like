import { createApp } from "vue";
import App from "./App.vue";
import "bootstrap";
import store from "./store/";
import { router } from "./router";

const app = createApp(App);
app.use(router);
app.use(store);
app.mount("#app");
