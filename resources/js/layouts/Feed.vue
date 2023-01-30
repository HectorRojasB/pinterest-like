<script setup>
import store from "../store/index";
import Post from "../components/Post.vue";
import Navbar from "../components/Navbar.vue";
import { feedHasMorePosts } from "../utils/helpers";
import { getPostsByPage } from "../utils/apiRoutes";
import PostDetailModal from "../components/PostDetailModal.vue";

const props = defineProps({
    className: String,
    requiresModeration: Boolean,
});

const openModal = (post) => {
    store.commit("SET_SELECTED_POST", post);
    store.commit("SET_POST_DETAIL_MODAL_OPEN", true);
};
</script>

<template>
    <div :class="className">
        <Navbar />
        <div class="container posts-container">
            <Post
                @click="openModal(post)"
                v-for="post in store.state.posts"
                :key="post.id"
                :title="post.title"
                :description="post.description"
                :likes="post.likes"
                :image_url="post.image_url"
                :requiresAuthentication="requiresModeration"
            />
        </div>

        <div
            v-if="feedHasMorePosts()"
            class="d-flex justify-content-center mt-3 mb-3"
        >
            <button
                @click="getPostsByPage(store.state.pagination.links.next)"
                class="btn btn-primary btn-lg"
            >
                Show more
            </button>
        </div>

        <PostDetailModal v-if="store.state.postDetailModalOpen" />
    </div>
</template>
