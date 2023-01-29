<script setup>
import { registerUser } from "../utils/apiRoutes";
import { ref } from "vue";

let name = ref("");
let email = ref("");
let password = ref("");
let isAdmin = ref(false);
let confirmPassword = ref("");

const register = () => {
    registerUser({
        name: name.value,
        email: email.value,
        password: password.value,
        confirm_password: confirmPassword.value,
        is_admin: isAdmin.value,
    });
};
</script>
<template>
    <form @submit.prevent="register()">
        <div class="mb-3 text-start">
            <label>Name</label>
            <input
                v-model="name"
                class="form-control"
                type="text"
                placeholder="Your email"
            />
        </div>
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
        <div class="mb-3 text-start">
            <label>Repeat password</label>
            <input
                v-model="confirmPassword"
                class="form-control"
                type="password"
                placeholder="Your password"
            />
        </div>
        <div class="mb-3 text-start d-flex align-items-center">
            <input
                class="form-check-input me-3 mt-0"
                type="checkbox"
                v-model="isAdmin"
                aria-label="Checkbox for following text input"
            />
            <label class="">Is admin</label>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
    </form>
</template>
