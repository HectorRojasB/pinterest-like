import axios from "axios";
import { store } from "./store";

export const getPosts = () => {
    return axios.get("/api/posts").then((response) => {
        store.posts = response.data.data;
    });
};

export const postPosts = (formData) => {
    let config = {
        header: {
            "Content-Type": "multipart/form-data",
        },
    };
    return axios.post("/posts", formData, config).then((respose) => {
        $("#modal").modal("show");
    });
};

export const registerUser = (data) => {
    return axios.post("/register", data).then((response) => {
        window.location.href = "/";
    });
};

export const login = (data) => {
    return axios.post("/login", data).then(() => {
        window.location.href = "/";
    });
};

export const logout = () => {
    return axios.post("/logout").then(() => {
        window.location.href = "/";
    });
};

export const getPostsByUser = (userId) => {
    return axios.get(`/users/${userId}/posts`).then((response) => {
        console.log(response);
        store.posts = respose.data;
    });
};

export const getUnauthorizedPosts = () => {
    return axios.get("/api/getUnauthorizedPosts").then((response) => {
        store.posts = response.data;
    });
};

export const authorizePost = (postId) => {
    return axios.post(`/post/${postId}/authorize`).then((response) => {
        window.location.href = "/moderation";
    });
};

export const addFavorite = (postId) => {
    return axios.post(`/user/addFavorite/${postId}`).then((response) => {
        //window.location.href = "/moderation";
    });
};
