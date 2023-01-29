<script setup>
import { computed, ref, onMounted } from "vue";
import store from "../store/index";
import { isUserLogged } from "../utils/helpers";
import Post from "../components/Post.vue";
import { getPosts, getPostsByUser } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";
import PostDetailModal from "../components/PostDetailModal.vue";

onMounted(() => {
    if (isUserLogged()) {
        getPostsByUser(store.state.loggedUser.id);
    } else {
        getPosts();
    }
});

const openModal = (post) => {
    store.commit("SET_SELECTED_POST", post);
    store.commit("SET_POST_DETAIL_MODAL_OPEN", true);
};
const posts = computed(() => store.posts);
</script>

<template>
    <div class="home">
        {{ posts }}
        <Navbar />
        <div class="container posts-container">
            <Post
                @click="openModal(post)"
                v-for="post in store.state.posts.data"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="0"
                :image_url="post.image_url"
            />
        </div>

        <PostDetailModal v-if="store.state.postDetailModalOpen" />
    </div>
</template>
