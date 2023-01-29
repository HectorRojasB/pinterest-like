<script setup>
import { onMounted } from "vue";
import store from "../store/index";
import Post from "../components/Post.vue";
import Navbar from "../components/Navbar.vue";
import { getPosts } from "../utils/apiRoutes";
import PostDetailModal from "../components/PostDetailModal.vue";

onMounted(() => {
    getPosts();
});

const openModal = (post) => {
    store.commit("SET_SELECTED_POST", post);
    store.commit("SET_POST_DETAIL_MODAL_OPEN", true);
};
</script>

<template>
    <div class="discover">
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
            />
        </div>

        <PostDetailModal v-if="store.state.postDetailModalOpen" />
    </div>
</template>
