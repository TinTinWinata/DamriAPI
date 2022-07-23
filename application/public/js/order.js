import { API_URL_ORDER, getConf } from "./config.js";
const root = document.getElementById("root");

function handleUpdate(id) {
    if (id) window.location.replace(`/update-bus/${id}`);
}

function handleDelete(id) {
    const conf = getConf();
    axios
        .delete(API_URL_ORDER + `/${id}`, conf)
        .then((resp) => {
            if (resp.status === 200) {
                window.location.reload();
            }
        })
        .catch((resp) => {
            console.log(resp);
        });
}

window.handleUpdate = handleUpdate;
window.handleDelete = handleDelete;

getBusData();

function getBusData() {
    let htmlText = "";

    axios.get(API_URL_ORDER, getConf()).then((resp) => {
        const data = resp.data;
        data.forEach((e) => {
            console.log(e);
            htmlText += `
            <tr>
            <td>${e.id}</td>
            <td>${e.bus.plate_number}</td>
            <td>${e.driver.name}</td>
            <td>${e.contact_name}</td>
            <td>${e.contact_phone}</td>
            <td>${e.start_rent_date}</td>
            <td>${e.total_rent_days}</td>
            <td><a href="#" onclick="handleDelete(${e.id})"" class="btn btn-sm btn-danger">Hapus</a></td>
        </tr>`;
        });
        root.innerHTML = htmlText;
    });
}
