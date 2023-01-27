<script setup>
import { store } from "../utils/store";
const closeModal = () => {
    store.postDetailModalOpen = false;
    store.selectedPost = {};
};
</script>
<template>
    <div class="modal post-detail-modal">
        <div class="modal-content">
            <div class="mt-2 mb-2 d-flex justify-content-end">
                <button class="btn btn-danger" @click="closeModal()">X</button>
            </div>
            <img
                :src="store.selectedPost.image_url"
                :alt="store.selectedPost.title"
            />
            <h2 class="mt-3">{{ store.selectedPost.title }}</h2>
            <p class="mt-2">{{ store.selectedPost.description }}</p>
        </div>
    </div>
</template>
