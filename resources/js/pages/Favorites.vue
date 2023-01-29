<script setup>
import { onMounted } from "vue";
import Feed from "../layouts/Feed.vue";
import { favorites } from "../utils/apiRoutes";
onMounted(() => {
    favorites();
});
</script>
<template>
    <Feed class-name="favorites" :requires-moderation="false" />
</template>
