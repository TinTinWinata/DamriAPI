import { API_URL_BUS, API_URL_DRIVER, getConf } from "./config.js";
const root = document.getElementById("root");

function handleUpdate(id) {
    if (id) window.location.replace(`/update-driver/${id}`);
}

function handleDelete(id) {
    const conf = getConf();
    axios
        .delete(API_URL_DRIVER + `/${id}`, conf)
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

    axios.get(API_URL_DRIVER, getConf()).then((resp) => {
        const data = resp.data;
        data.forEach((e) => {
            console.log(e);
            htmlText += `
            <tr>
            <td>${e.id}</td>
            <td>${e.name}</td>
            <td>${e.age}</td>
            <td>${e.id_number}</td>
            <td>
                <a href="#" onclick="handleUpdate(${e.id})" class="btn btn-sm btn-info">Edit</a>
                <a href="#"  onclick="handleDelete(${e.id})"class="btn btn-sm btn-danger">Delete</a>
            </td>
              </tr>

            `;
        });
        root.innerHTML = htmlText;
    });
}
