import { API_URL_LOGOUT, getToken, isUser, setToken } from "./config.js";

const myNav = document.getElementById("myNav");
const logoutBtn = document.getElementById("logout-btn");

checkUser();

logoutBtn.addEventListener("click", logOut);

function checkUser() {
    if (isUser()) {
        // Kalau user
        console.log('user : ', isUser());
        myNav.style.display = "block";
    } else {
        // Kalau bukan user
        myNav.style.display = "none";

        if (
            window.location.pathname !== "/" &&
            window.location.pathname !== "/login"
        ) {
            window.location.replace("/login");
        }
    }
}

function logOut() {
    const token = getToken();

    if (token) {
        console.log(API_URL_LOGOUT);
        const conf = {
            headers: { Authorization: `Bearer ${token}` },
        };

        axios
            .get(API_URL_LOGOUT, conf)
            .then((resp) => {
                setToken();
                window.location.replace("/");
            })
            .catch((err) => {
                console.log(err);
            });
    }
}
