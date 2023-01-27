import axios from "axios";
import { store } from "./store";

export const getPosts = () => {
    return axios.get("/api/posts").then((respose) => {
        store.posts = respose.data;
    });
};

export const postPosts = (formData) => {
    let config = {
        header: {
            "Content-Type": "multipart/form-data",
        },
    };
    return axios.post("/api/posts", formData, config).then((respose) => {
        $("#modal").modal("show");
    });
};

export const registerUser = (data) => {
    return axios.post("/register", data).then((response) => {
        //console.log(response);
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
