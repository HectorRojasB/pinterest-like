import { reactive } from "vue";

export const store = reactive({
    posts: [],
    postDetailModalOpen: false,
    selectedPost: {},
});
