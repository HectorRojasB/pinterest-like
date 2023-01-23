<script setup>
const props = defineProps({
    title: String,
    description: String,
    likes: Number,
    image_url: String,
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
            <div class="likes">❤️ {{ likes }}</div>
        </div>
    </div>
</template>
