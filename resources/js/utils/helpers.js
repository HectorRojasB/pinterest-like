import { store } from "./store";

const isUserLogged = () => {
    return Object.keys(store.loggedUser).length != 0 ? true : false;
};

export { isUserLogged };
