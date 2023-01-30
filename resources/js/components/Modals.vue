<script setup>
import LoginError from "./modals/LoginError.vue";
import PostCreation from "./modals/PostCreation.vue";
</script>

<template>
    <div class="modal fade" id="post-creation" tabindex="-1" aria-hidden="true">
        <PostCreation />
    </div>
    <div class="modal fade" id="login-error" tabindex="-1" aria-hidden="true">
        <LoginError />
    </div>
</template>
