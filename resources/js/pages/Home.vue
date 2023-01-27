<script setup>
import { onMounted } from "vue";
import { store } from "../utils/store";
import Post from "../components/Post.vue";
import { getPosts, getPostsByUser } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";
import PostDetailModal from "../components/PostDetailModal.vue";

onMounted(() => {
    if (Object.keys(store.loggedUser).length != 0) {
        getPostsByUser(store.loggedUser.id);
    } else {
        getPosts();
    }
});

const openModal = (post) => {
    store.selectedPost = post;
    store.postDetailModalOpen = true;
};
</script>

<template>
    <div class="home">
        <Navbar />
        <div class="container posts-container">
            <Post
                @click="openModal(post)"
                v-for="post in store.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="0"
                :image_url="post.image_url"
            />
        </div>

        <PostDetailModal v-if="store.postDetailModalOpen" />
    </div>
</template>
