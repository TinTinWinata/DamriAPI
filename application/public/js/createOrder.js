import { API_URL_ORDER, getConf } from "./config.js";

const form = document.getElementById("submit-form");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    const contactName = e.target.contact_name.value;
    const contactPhone = e.target.contact_phone.value;
    const startRentDate = e.target.start_rent_date.value;
    const totalRentDay = e.target.total_rent_days.value;

    if (
        contactName == "" ||
        contactPhone == "" ||
        startRentDate == "" ||
        totalRentDay == ""
    ) {
        console.log("please provide all data");
        return;
    }

    const data = {
        contact_name: contactName,
        contact_phone: contactPhone,
        start_rent_date: startRentDate,
        total_rent_days: totalRentDay,
    };

    const conf = getConf();

    axios
        .post(API_URL_ORDER, data, conf)
        .then((resp) => {
            if (resp.status == 200) window.location.replace("/order");
        })
        .catch((err) => {
            console.log(err);
        });
});
