<script setup>
import store from "../store/index";
import Post from "../components/Post.vue";
import Navbar from "../components/Navbar.vue";
import PostDetailModal from "../components/PostDetailModal.vue";
const props = defineProps({
    className: String,
    requiresModeration: Boolean,
});
</script>

<template>
    <div :class="className">
        <Navbar />
        <div class="container posts-container">
            <Post
                @click="openModal(post)"
                v-for="post in store.state.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="post.likes"
                :image_url="post.image_url"
                :requiresAuthentication="requiresModeration"
            />
        </div>

        <PostDetailModal v-if="store.state.postDetailModalOpen" />
    </div>
</template>
