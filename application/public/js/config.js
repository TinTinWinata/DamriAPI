export const WEB_NAME = "127.0.0.1:8000";
export const URL = "http://" + WEB_NAME;
export const API_URL = URL + "/v1";
export const API_URL_LOGIN = API_URL + "/auth/login";
export const API_URL_LOGOUT = API_URL + "/auth/logout";
export const API_URL_BUS = API_URL + "/buses";
export const API_URL_DRIVER = API_URL + "/drivers";
export const API_URL_ORDER = API_URL + "/orders";

const STORAGE_TOKEN_NAME = "TOKEN_BEARER";

export function getToken() {
    return localStorage.getItem(STORAGE_TOKEN_NAME);
}

export function getConf() {
    const config = {
        headers: {
            Authorization: "Bearer " + getToken(),
        },
    };
    return config;
}

export function setToken(token) {
    localStorage.setItem(STORAGE_TOKEN_NAME, token);
}

export function isUser() {
    const item = localStorage.getItem(STORAGE_TOKEN_NAME);

    if (item === undefined || item == "undefined") {
        return false;
    } else {
        return true;
    }
}
