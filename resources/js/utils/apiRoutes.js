import axios from "axios";
import { store } from "./store";

export const getPosts = () => {
    return axios.get("/api/posts").then((respose) => {
        store.posts = respose.data;
    });
};
