import axios from "axios";
import store from "../store";
import { router } from "../router";
import { loggedUserRequestHeaders } from "./helpers";

//Authenticate User
export const login = (data) => {
    return axios.post("/api/login", data).then((response) => {
        if (response.data.hasOwnProperty("error_code")) {
            $("#login-error").modal("show");
        }
        store.commit(
            "SET_API_ACCES_TOKEN",
            `${response.data.data.token_type} ${response.data.data.access_token}`
        );
        getUser();
    });
};

export const logout = () => {
    return axios
        .post("/api/logout", {}, { headers: loggedUserRequestHeaders() })
        .then(() => {
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
    return axios
        .get("/api/user", { headers: loggedUserRequestHeaders() })
        .then((response) => {
            store.commit("SET_LOGGED_USER", response.data.data);
            router.push({ name: "home" });
        });
};

//Posts

export const getPosts = () => {
    return axios.get("/api/posts").then((response) => {
        store.commit("SET_POSTS", response.data.data);
        store.commit("SET_PAGINATION", response.data.meta.pagination);
    });
};

export const getPostsByPage = (url) => {
    return axios.get(url).then((response) => {
        store.commit("ADD_POSTS", response.data.data);
        store.commit("SET_PAGINATION", response.data.meta.pagination);
    });
};

export const getPostsByUser = (userId) => {
    return axios
        .get(`/api/users/${userId}/posts`, {
            headers: loggedUserRequestHeaders(),
        })
        .then((response) => {
            store.commit("SET_POSTS", response.data.data);
            store.commit("SET_PAGINATION", response.data.meta.pagination);
        });
};

export const createPosts = (formData) => {
    let config = {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    };
    return axios.post("/api/posts", formData, config).then(() => {
        $("#post-creation").modal("show");
    });
};

export const getUnauthorizedPosts = () => {
    return axios
        .get("/api/unauthorized/posts", { headers: loggedUserRequestHeaders() })
        .then((response) => {
            store.commit("SET_POSTS", response.data.data);
            store.commit("SET_PAGINATION", response.data.meta.pagination);
        });
};

export const authorizePost = (postId) => {
    return axios
        .post(
            `/api/authorize/posts/${postId}`,
            {},
            { headers: loggedUserRequestHeaders() }
        )
        .then(() => {
            getUnauthorizedPosts();
            router.push({ name: "moderation" });
        });
};

//Favorites
export const addFavorite = (postId) => {
    return axios
        .post(
            `/api/favorites/add/${postId}`,
            {},
            { headers: loggedUserRequestHeaders() }
        )
        .then(() => {
            getPostsByUser(store.state.loggedUser.id);
            router.push({ name: "home" });
            store.commit("SET_POST_DETAIL_MODAL_OPEN", false);
        });
};

export const removeFavorite = (postId) => {
    return axios
        .post(
            `/api/favorites/remove/${postId}`,
            {},
            { headers: loggedUserRequestHeaders() }
        )
        .then(() => {
            getPostsByUser(store.state.loggedUser.id);
            router.push({ name: "home" });
            store.commit("SET_POST_DETAIL_MODAL_OPEN", false);
        });
};

export const favorites = () => {
    return axios
        .get("/api/favorites", { headers: loggedUserRequestHeaders() })
        .then((response) => {
            store.commit("SET_POSTS", response.data.data);
            store.commit("SET_PAGINATION", response.data.meta.pagination);
        });
};
