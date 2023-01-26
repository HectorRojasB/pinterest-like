<script setup>
import { onMounted } from "vue";
import { store } from "../utils/store";
import Post from "../components/Post.vue";
import { getPosts } from "../utils/apiRoutes";

onMounted(() => {
    getPosts();
});
</script>

<template>
    <div class="home">
        <div class="d-flex justify-content-between header">
            <div class="container d-flex justify-content-between">
                <h3>Pinterest-Like</h3>
                <div class="actions d-flex">
                    <div class="btn btn-secondary">❤️ Favorites</div>
                    <div class="btn btn-secondary">Upload</div>
                    <div class="btn btn-primary">Login</div>
                </div>
            </div>
        </div>
        <div class="container posts-container">
            <Post
                v-for="post in store.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                likes="0"
                :image_url="post.image_url"
            />
        </div>
    </div>
</template>
