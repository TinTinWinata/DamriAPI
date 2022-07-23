import { setToken } from "./config.js";

const WEB_NAME = "127.0.0.1:8000";
const URL = "http://" + WEB_NAME;
const API_URL = URL + "/v1";
const API_URL_LOGIN = API_URL + "/auth/login";

const form = document.getElementById("myForm");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    const username = e.target.username.value;
    const password = e.target.password.value;

    axios
        .post(API_URL_LOGIN, {
            username: username,
            password: password,
        })
        .then((resp) => {
            if (resp.data) {
                setToken(resp.data);
                window.location.replace("/bus");
            }
        })
        .catch((err) => {
            console.log(err);
        });

    // console.log("url : ", API_URL_LOGIN);

    // const data = {
    //     method: "POST",
    //     header: {
    //         "Accept-Encoding": "gzip, deflate, br",
    //         Connection: "keep-alive",
    //         Accept: "application/json",
    //         "Content-Type": "",
    //     },
    //     body: {
    //         username: username,
    //         password: password,
    //     },
    // };

    // Using Fetch still bug
    // fetch(API_URL_LOGIN, data)
    //     .then((resp) => {
    //         return resp.json();
    //     })
    //     .then((data) => {
    //         console.log(data);
    //     })
    //     .catch((err) => {
    //         console.log(err);
    //     });
});
