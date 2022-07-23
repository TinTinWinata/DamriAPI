import { API_URL_BUS, API_URL_DRIVER, getConf } from "./config.js";

const form = document.getElementById("submit-form");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    console.log(e);
    const name = e.target.username.value;
    const age = e.target.age.value;
    const idNumber = e.target.id_number.value;
    const id = e.target.id.value;

    console.log(name, age, idNumber);

    if (name == "" || age == "" || idNumber == "") {
        console.log("please provide all data");
        return;
    }

    const data = {
        id_number: idNumber,
        age: age,
        name: name,
    };

    const conf = getConf();

    console.log(data, conf);

    axios
        .put(API_URL_DRIVER + `/${id}`, data, conf)
        .then((resp) => {
            console.log("resp", resp);
            if (resp.status == 200) window.location.replace("/driver");
        })
        .catch((err) => {
            console.log(err);
        });
});
