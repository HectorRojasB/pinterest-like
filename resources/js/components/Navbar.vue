<script setup>
import store from "../store";
import { router } from "../router";
import { logout } from "../utils/apiRoutes";
import { isUserLogged } from "../utils/helpers";
</script>

<template>
    <div class="d-flex justify-content-between header">
        <div class="container d-flex justify-content-between">
            <a href="/">
                <h3>Pinterest-Like</h3>
            </a>

            <div class="actions d-flex align-items-center">
                <div v-if="isUserLogged()" class="d-flex">
                    {{ store.state.loggedUser.email }}
                    <p v-if="store.state.loggedUser.role == 'admin'">(Admin)</p>
                </div>
                <div v-if="store.state.loggedUser.role == 'admin'">
                    <button
                        @click="router.push({ name: 'moderation' })"
                        class="btn btn-primary"
                    >
                        Moderation
                    </button>
                </div>
                <div v-if="isUserLogged()">
                    <button
                        @click="router.push({ name: 'favorites' })"
                        class="btn btn-secondary"
                    >
                        ❤️ Favorites
                    </button>
                </div>
                <button
                    @click="router.push({ name: 'upload' })"
                    class="btn btn-secondary"
                >
                    Upload
                </button>

                <button
                    v-if="isUserLogged()"
                    @click="logout"
                    class="btn btn-primary"
                >
                    logout
                </button>

                <button
                    @click="router.push({ name: 'login' })"
                    v-else
                    class="btn btn-primary"
                >
                    Login
                </button>
            </div>
        </div>
    </div>
</template>
