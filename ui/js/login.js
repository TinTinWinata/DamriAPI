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

  $.ajax({
    headers: {
      Accept: "application/json",
      "Content-Type": "text/plain;charset=utf-8",
    },
    type: "POST",
    url: API_URL_LOGIN,
    data: `{R
      "username" : ${username},
      "password" : ${password},
    }`,
    success: function (resp) {
      console.log(resp);
    },
    dataType: "json",
  });

  // fetch(API_URL_LOGIN, data)
  //   .then((resp) => {
  //     resp.json();
  //   })
  //   .then((resp) => {
  //     console.log(resp);
  //   })
  //   .catch((err) => {
  //     alert(err);
  //   });
});
