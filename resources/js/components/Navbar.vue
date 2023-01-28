<script setup>
import { store } from "../utils/store";
import { isUserLogged } from "../utils/helpers";
import { logout } from "../utils/apiRoutes";
</script>

<template>
    <div class="d-flex justify-content-between header">
        <div class="container d-flex justify-content-between">
            <a href="/">
                <h3>Pinterest-Like</h3>
            </a>

            <div class="actions d-flex align-items-center">
                <div v-if="isUserLogged()" class="d-flex">
                    {{ store.loggedUser.email }}
                    <p v-if="store.loggedUserRole == 'admin'">(Admin)</p>
                </div>
                <div v-if="store.loggedUserRole == 'admin'">
                    <a href="/moderation" class="btn btn-primary">Moderation</a>
                </div>
                <div class="btn btn-secondary">❤️ Favorites</div>
                <a href="/upload" class="btn btn-secondary">Upload</a>

                <button
                    v-if="isUserLogged()"
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
