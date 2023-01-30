import store from "../store";

const isUserLogged = () => {
    return Object.keys(store.state.loggedUser).length != 0 ? true : false;
};

const loggedUserRequestHeaders = () => {
    return {
        Accept: "application/json",
        Authorization: store.state.apiAccessToken,
    };
};

const feedHasMorePosts = () => {
    let hasPagination =
        Object.keys(store.state.pagination).length != 0 ? true : false;

    let isLastPostsPages =
        store.state.pagination.total_pages !=
        store.state.pagination.current_page;

    return hasPagination && isLastPostsPages;
};

export { isUserLogged, loggedUserRequestHeaders, feedHasMorePosts };
