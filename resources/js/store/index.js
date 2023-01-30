import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";

const store = createStore({
    state: {
        posts: [],
        postDetailModalOpen: false,
        selectedPost: {},
        apiAccessToken: "",
        loggedUser: {},
        pagination: {},
    },
    getters: {
        apiAccessToken(state) {
            return state.apiAccessToken;
        },
        loggedUser(state) {
            return state.loggedUser;
        },
        posts(state) {
            return state.posts;
        },
        postDetailModalOpen(state) {
            return state.postDetailModalOpen;
        },
        selectedPost(state) {
            return state.selectedPost;
        },
        pagination(state) {
            return state.pagination;
        },
    },
    mutations: {
        SET_API_ACCES_TOKEN(state, value) {
            state.apiAccessToken = value;
        },
        SET_LOGGED_USER(state, value) {
            state.loggedUser = value;
        },
        SET_POSTS(state, value) {
            state.posts = value;
        },
        SET_POST_DETAIL_MODAL_OPEN(state, value) {
            state.postDetailModalOpen = value;
        },
        SET_SELECTED_POST(state, value) {
            state.selectedPost = value;
        },
        SET_PAGINATION(state, value) {
            state.pagination = value;
        },
        ADD_POSTS(state, value) {
            state.posts = [...state.posts, ...value];
        },
    },
    actions: {},
    plugins: [createPersistedState()],
});

export default store;
