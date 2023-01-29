<script setup>
import { ref } from "vue";
import store from "../store";
import Navbar from "../components/Navbar.vue";
import LoginForm from "../components/LoginForm.vue";
import RegisterForm from "../components/RegisterForm.vue";

let activeForm = ref("sign-in");
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
                        <LoginForm />
                    </div>
                    <div v-if="activeForm == 'sign-up'" class="sign-up-form">
                        <RegisterForm />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
