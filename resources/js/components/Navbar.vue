<script setup>
import { store } from "../utils/store";
import { logout } from "../utils/apiRoutes";
</script>

<template>
    <div class="d-flex justify-content-between header">
        <div class="container d-flex justify-content-between">
            <a href="/">
                <h3>Pinterest-Like</h3>
            </a>

            <div class="actions d-flex align-items-center">
                <div v-if="Object.keys(store.loggedUser).length != 0">
                    {{ store.loggedUser.email }}
                </div>
                <div class="btn btn-secondary">❤️ Favorites</div>
                <a href="/upload" class="btn btn-secondary">Upload</a>

                <button
                    v-if="Object.keys(store.loggedUser).length != 0"
                    @click="logout"
                    class="btn btn-primary"
                >
                    logout
                </button>

                <a v-else href="/login" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</template>
