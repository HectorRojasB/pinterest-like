import { reactive } from "vue";

export const store = reactive({
    posts: [],
    postDetailModalOpen: false,
    selectedPost: {},
    loggedUser: document.querySelector("meta[name='user']")
        ? JSON.parse(
              document
                  .querySelector("meta[name='user']")
                  .getAttribute("content")
          )
        : {},
});
