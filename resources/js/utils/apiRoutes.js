import axios from "axios";
import store from "../store";
import { router } from "../router";

//Authenticate User
let headers = {
    headers: {
        Accept: "application/json",
        Authorization: store.state.apiAccessToken,
    },
};

export const login = (data) => {
    return axios.post("/api/login", data).then((response) => {
        store.commit(
            "SET_API_ACCES_TOKEN",
            `${response.data.data.token_type} ${response.data.data.access_token}`
        );
        getUser();
    });
};

export const logout = () => {
    return axios.post("/api/logout", {}, headers).then(() => {
        store.commit("SET_API_ACCES_TOKEN", "");
        store.commit("SET_LOGGED_USER", {});
        router.push({ name: "home" });
    });
};

export const registerUser = (data) => {
    return axios.post("/api/register", data).then(() => {
        router.push({ name: "home" });
    });
};

//User

export const getUser = () => {
    return axios.get("/api/user", headers).then((response) => {
        store.commit("SET_LOGGED_USER", response.data.data);
        router.push({ name: "home" });
    });
};

//Posts

export const getPosts = () => {
    return axios.get("/api/posts").then((response) => {
        store.commit("SET_POSTS", response.data.data);
    });
};

export const getPostsByUser = (userId) => {
    return axios.get(`/api/users/${userId}/posts`, headers).then((response) => {
        store.commit("SET_POSTS", response.data.data);
    });
};

export const createPosts = (formData) => {
    let config = {
        header: {
            "Content-Type": "multipart/form-data",
        },
    };
    return axios.post("/api/posts", formData, config).then(() => {
        $("#modal").modal("show");
    });
};

export const getUnauthorizedPosts = () => {
    return axios.get("/api/unauthorized/posts", headers).then((response) => {
        console.log("ajskjs");
        store.commit("SET_POSTS", response.data.data);
    });
};

export const authorizePost = (postId) => {
    return axios
        .post(`/api/authorize/posts/${postId}`, {}, headers)
        .then(() => {
            getUnauthorizedPosts();
            router.push({ name: "moderation" });
        });
};
//Favorites

export const addFavorite = (postId) => {
    return axios.post(`/user/addFavorite/${postId}`).then((response) => {
        //window.location.href = "/moderation";
    });
};
