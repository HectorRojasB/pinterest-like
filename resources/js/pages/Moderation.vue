<script setup>
import { onMounted } from "vue";
import Feed from "../layouts/Feed.vue";
import { getUnauthorizedPosts } from "../utils/apiRoutes";

onMounted(() => {
    getUnauthorizedPosts();
});
</script>
<template>
    <Feed className="moderation" :requiresModeration="true" />
</template>
