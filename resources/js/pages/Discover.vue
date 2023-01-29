<script setup>
import { onMounted } from "vue";
import Feed from "../layouts/Feed.vue";
import { getPosts } from "../utils/apiRoutes";

onMounted(() => {
    getPosts();
});
</script>

<template>
    <Feed class-name="discover" :requires-moderation="false" />
</template>
