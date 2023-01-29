<script setup>
import { onMounted } from "vue";
import { getUnauthorizedPosts } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";
import Post from "../components/Post.vue";
import PostDetailModal from "../components/PostDetailModal.vue";
import store from "../store";

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
                v-for="post in store.state.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="0"
                :image_url="post.image_url"
                :requiresAuthentication="true"
            />
        </div>
        <PostDetailModal v-if="store.state.postDetailModalOpen" />
    </div>
</template>
