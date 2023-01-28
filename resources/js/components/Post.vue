<script setup>
import { authorizePost } from "../utils/apiRoutes";
const props = defineProps({
    title: String,
    description: String,
    likes: Number,
    image_url: String,
    requiresAuthentication: Boolean,
    id: Number,
});
</script>
<template>
    <div class="post">
        <img class="image" :src="image_url" />
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
