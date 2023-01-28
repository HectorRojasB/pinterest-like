<script setup>
import { onMounted } from "vue";
import { getUnauthorizedPosts } from "../utils/apiRoutes";
import { store } from "../utils/store";
import Navbar from "../components/Navbar.vue";
import Post from "../components/Post.vue";
import PostDetailModal from "../components/PostDetailModal.vue";

onMounted(() => {
    getUnauthorizedPosts();
});
</script>
<template>
    <div class="moderation">
        <Navbar />
        <div class="container posts-container">
            <Post
                :id="post.id"
                v-for="post in store.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="0"
                :image_url="post.image_url"
                :requiresAuthentication="true"
            />
        </div>
        <PostDetailModal v-if="store.postDetailModalOpen" />
    </div>
</template>
