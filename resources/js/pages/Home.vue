<script setup>
import { onMounted } from "vue";
import store from "../store/index";
import Feed from "../layouts/Feed.vue";
import { isUserLogged } from "../utils/helpers";
import { getPosts, getPostsByUser } from "../utils/apiRoutes";

onMounted(() => {
    if (isUserLogged()) {
        getPostsByUser(store.state.loggedUser.id);
    } else {
        getPosts();
    }
});
</script>

<template>
    <Feed class-name="home" :requires-moderation="false" />
</template>
