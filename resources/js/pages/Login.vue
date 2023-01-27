<script setup>
import { ref } from "vue";
import { registerUser, login } from "../utils/apiRoutes";
import Navbar from "../components/Navbar.vue";

let activeForm = ref("sign-in");
let name = ref("");
let email = ref("");
let password = ref("");
let confirmPassword = ref("");

const register = () => {
    let data = {
        name: name.value,
        email: email.value,
        password: password.value,
        confirm_password: confirmPassword.value,
    };
    registerUser(data);
};

const formLogin = () => {
    let data = {
        email: email.value,
        password: password.value,
    };
    login(data);
};
</script>
<template>
    <Navbar />
    <div class="login">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6 text-center login-container">
                    <h3>Login</h3>

                    <div class="switches-container">
                        <button
                            class="btn btn-primary"
                            @click="activeForm = 'sign-in'"
                        >
                            Sign In
                        </button>
                        <button
                            class="btn btn-primary"
                            @click="activeForm = 'sign-up'"
                        >
                            Sign Up
                        </button>
                    </div>

                    <div v-if="activeForm == 'sign-in'" class="sign-in-form">
                        <form @submit.prevent="formLogin">
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
                                <button type="submit" class="btn btn-primary">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                    <div v-if="activeForm == 'sign-up'" class="sign-up-form">
                        <form @submit.prevent="register">
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
                            <div
                                class="mb-3 text-start d-flex align-items-center"
                            >
                                <input
                                    class="form-check-input me-3 mt-0"
                                    type="checkbox"
                                    value=""
                                    aria-label="Checkbox for following text input"
                                />
                                <label class="">Is admin</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
