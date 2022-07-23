import { API_URL_BUS, getConf } from "./config.js";
const root = document.getElementById("root");

function handleUpdate(id) {
    if (id) window.location.replace(`/update-bus/${id}`);
}

function handleDelete(id) {
    const conf = getConf();
    axios
        .delete(API_URL_BUS + `/${id}`, conf)
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

    axios.get(API_URL_BUS, getConf()).then((resp) => {
        const data = resp.data;
        data.forEach((e) => {
            htmlText += `                    <tr>
            <td>${e.id}</td>
            <td>${e.plate_number}</td>
            <td>${e.brand}</td>
            <td>${e.seat}</td>
            <td>${e.price_per_day}</td>
            <td>
                <a href="#" onclick="handleUpdate(${e.id})" class="btn btn-sm btn-info">Edit</a>
                <a href="#" onclick="handleDelete(${e.id})" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>`;
        });
        root.innerHTML = htmlText;
    });
}
