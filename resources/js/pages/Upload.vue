<script setup>
import { ref } from "vue";
import Navbar from "../components/Navbar.vue";
import { createPosts } from "../utils/apiRoutes";

let title = ref("");
let image = ref(null);
let preview = ref(null);
let description = ref("");

const onFileChange = (e) => {
    const file = e.target.files[0];
    image.value = file;
    preview.value = URL.createObjectURL(file);
};

const submit = () => {
    const formData = new FormData();
    formData.append("title", title.value);
    formData.append("description", description.value);
    formData.append("image", image.value);

    createPosts(formData);
    resetForm();
};

const resetImage = () => {
    preview.value = null;
};

const resetForm = () => {
    title.value = "";
    description.value = "";
    preview.value = null;
    image.value = null;
};
</script>
<template>
    <div class="upload">
        <Navbar />

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6 text-center upload-container">
                    <h3>Upload your image</h3>
                    <form
                        @submit.prevent="submit()"
                        enctype="multipart/form-data"
                    >
                        <div
                            v-if="!preview"
                            class="mt-3 text-start d-flex flex-column"
                        >
                            <label for="description" class="form-label">
                                Image
                            </label>
                            <label class="btn btn-primary">
                                <input
                                    required
                                    v-if="!preview"
                                    class="form-control"
                                    type="file"
                                    placeholder="Post Description"
                                    @change="onFileChange"
                                    accept="image/png, image/jpg, image/jpeg"
                                />
                                <i>Choose file</i>
                            </label>
                        </div>
                        <div v-if="preview" class="mt-3 text-start preview">
                            <p>Preview</p>
                            <img :src="preview" />
                            <button
                                class="btn btn-danger"
                                @click="resetImage()"
                            >
                                Reset
                            </button>
                        </div>

                        <div class="mt-3 text-start">
                            <label
                                for="title"
                                class="text-start mt-3 form-label"
                            >
                                Title
                            </label>
                            <input
                                required
                                v-model="title"
                                name="title"
                                class="form-control"
                                type="text"
                                placeholder="Post Title"
                            />
                        </div>

                        <div class="mt-3 text-start">
                            <label
                                for="description"
                                class="text-start mt-3 form-label"
                            >
                                Description
                            </label>

                            <textarea
                                required
                                v-model="description"
                                class="form-control"
                                name="description"
                                rows="5"
                                cols="33"
                                placeholder="Post Description"
                            >
                            </textarea>
                        </div>

                        <button type="submit" class="mt-3 btn btn-primary">
                            Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
