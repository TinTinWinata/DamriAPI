import { API_URL_BUS, getConf } from "./config.js";

const form = document.getElementById("submit-form");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    const plateNumber = e.target.plate_number.value;
    const brand = e.target.brand.value;
    const seat = e.target.seat.value;
    const pricePerDay = e.target.price_per_day.value;

    if (
        plateNumber == "" ||
        brand == "" ||
        seat == "" ||
        pricePerDay == "" ||
        id == ""
    ) {
        console.log("please provide all data");
        return;
    }

    const data = {
        plate_number: plateNumber,
        brand: brand,
        seat: seat,
        price_per_day: pricePerDay,
    };

    const conf = getConf();

    axios
        .post(API_URL_BUS, data, getConf())
        .then((resp) => {
            window.location.replace("/bus");
        })
        .catch((err) => {
            console.log(err);
        });
});
