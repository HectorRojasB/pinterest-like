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
