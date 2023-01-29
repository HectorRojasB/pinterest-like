<script setup>
import { ref } from "vue";
import { login } from "../utils/apiRoutes";

let email = ref("");
let password = ref("");

const formLogin = () => {
    login({
        username: email.value,
        password: password.value,
    });
};
</script>

<template>
    <form @submit.prevent="formLogin()">
        <div class="mb-3 text-start">
            <label>Email</label>
            <input
                v-model="email"
                class="form-control"
                type="email"
                placeholder="Your email"
            />
        </div>
        <div class="mb-3 text-start">
            <label>Password</label>
            <input
                v-model="password"
                class="form-control"
                type="password"
                placeholder="Your password"
            />
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
    </form>
</template>
