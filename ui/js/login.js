import { API_URL_LOGIN } from "./config.js";

const form = document.getElementById("myForm");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  const username = e.target.username.value;
  const password = e.target.password.value;

  const data = {
    method: "POST",
    header: {
      "Accept-Encoding": "gzip, deflate, br",
      Connection: "keep-alive",
      Accept: "application/json",
    },
    body: {
      username: username,
      password: password,
    },
  };

  fetch("http://example.com/movies.json")
    .then((response) => response.json())
    .then((data) => console.log(data));

  // fetch(API_URL_LOGIN, data)
  //   .then((resp) => {
  //     console.log(resp.json());
  //   })
  //   .catch((err) => {
  //     alert(err);
  //   });
});
