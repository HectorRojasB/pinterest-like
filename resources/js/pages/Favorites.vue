<script setup>
import store from "../store";
import { onMounted } from "vue";
import { favorites } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";
import Post from "../components/Post.vue";
import PostDetailModal from "../components/PostDetailModal.vue";
onMounted(() => {
    favorites();
});
const openModal = (post) => {
    store.commit("SET_SELECTED_POST", post);
    store.commit("SET_POST_DETAIL_MODAL_OPEN", true);
};
</script>
<template>
    <div class="favorites">
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
