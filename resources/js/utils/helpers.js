import store from "../store";

const isUserLogged = () => {
    return Object.keys(store.state.loggedUser).length != 0 ? true : false;
};

export { isUserLogged };
