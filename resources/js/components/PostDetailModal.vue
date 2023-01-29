<script setup>
import store from "../store";
import { isUserLogged } from "../utils/helpers";
import { addFavorite } from "../utils/apiRoutes";
const closeModal = () => {
    store.commit("SET_SELECTED_POST", {});
    store.commit("SET_POST_DETAIL_MODAL_OPEN", false);
};
</script>
<template>
    <div class="modal post-detail-modal">
        <div class="modal-content">
            <div class="mt-2 mb-2 d-flex justify-content-end">
                <button class="btn btn-danger" @click="closeModal()">X</button>
            </div>
            <img
                :src="store.state.selectedPost.image_url"
                :alt="store.state.selectedPost.title"
            />
            <h2 class="mt-3">{{ store.state.selectedPost.title }}</h2>
            <p class="mt-2">{{ store.state.selectedPost.description }}</p>
            <div v-if="isUserLogged()">
                <button
                    @click="addFavorite(store.state.selectedPost.id)"
                    class="btn btn-primary"
                >
                    Add to Favorites
                </button>
            </div>
        </div>
    </div>
</template>
