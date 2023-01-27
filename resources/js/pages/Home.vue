<script setup>
import { onMounted } from "vue";
import { store } from "../utils/store";
import Post from "../components/Post.vue";
import { getPosts } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";

onMounted(() => {
    getPosts();
});
</script>

<template>
    <div class="home">
        <Navbar />
        <div class="container posts-container">
            <Post
                v-for="post in store.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="0"
                :image_url="post.image_url"
            />
        </div>
    </div>
</template>
