<script setup>
import { ref } from "vue";
import { authorizePost } from "../utils/apiRoutes";
const props = defineProps({
    title: String,
    description: String,
    likes: Number,
    image_url: String,
    requiresAuthentication: Boolean,
    id: Number,
});

const isLoaded = ref(false);

const onImgLoad = () => {
    isLoaded.value = true;
};
</script>
<template>
    <div class="post">
        <div class="image-container">
            <img class="image" :src="image_url" @load="onImgLoad" />
            <div class="placeholder-image" :class="{ hidden: isLoaded }"></div>
        </div>

        <div class="content">
            <div class="title">
                {{ title }}
            </div>
            <div class="description">
                {{ description }}
            </div>
            <div v-if="requiresAuthentication">
                <button
                    class="btn btn-primary mt-3 w-100"
                    @click="authorizePost(id)"
                >
                    Allow
                </button>
            </div>
            <div v-else class="likes">❤️ {{ likes }}</div>
        </div>
    </div>
</template>
