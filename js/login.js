const form = document.getElementById("form");

const btnLogin = document.getElementById("btnLogin");

const btn = document.querySelector(".fa-eye");
const btnHidden = document.querySelector(".fa-eye-slash");

const btnLogout = document.querySelector(".log-off");

btn.addEventListener("click", () => {
  const inputPassword = document.querySelector("#password");
  btn.setAttribute("style", "visibility: hidden");
  btnHidden.setAttribute("style", "visibility: visible");

  if (inputPassword.getAttribute("type") == "password") {
    inputPassword.setAttribute("type", "text");
  } else {
    inputPassword.setAttribute("type", "password");
  }
});

btnHidden.addEventListener("click", () => {
  const inputPassword = document.querySelector("#password");
  btnHidden.setAttribute("style", "visibility: hidden");
  btn.setAttribute("style", "visibility: visible");

  if (inputPassword.getAttribute("type") == "password") {
    inputPassword.setAttribute("type", "text");
  } else {
    inputPassword.setAttribute("type", "password");
  }
});

form.addEventListener("submit", (event) => {
  event.preventDefault();

  enter();
});

btnLogin.addEventListener("click", function enter() {
  let login = document.getElementById("login");
  let loginLabel = document.querySelector("#loginLabel");

  let password = document.getElementById("password");
  let passwordLabel = document.querySelector("#passwordLabel");

  let msgError = document.querySelector("#msgError");

  let userList = [];

  let userValid = {
    login: "",
    password: "",
  };

  userList = JSON.parse(localStorage.getItem("userList"));

  userList.forEach((item) => {
    if (login.value == item.loginCad && password.value == item.passwordCad) {
      userValid = {
        login: item.loginCad,
        password: item.passwordCad,
      };
    }
  });

  if (login.value == "" && password.value == "") {
    msgError.setAttribute("style", "display: block");
    msgError.innerHTML = "Login e senha devem ser preenchidos ";
    loginLabel.setAttribute("style", "color:red");
    login.setAttribute("style", "border-color:red");
    passwordLabel.setAttribute("style", "color:red");
    password.setAttribute("style", "border-color:red");
  } else if (
    login.value == userValid.login &&
    password.value == userValid.password
  ) {
    msgSuccess.setAttribute("style", "display: block");
    msgSuccess.innerHTML = "<strong>Logando usuário...</strong>";
    msgError.innerHTML = "";
    msgError.setAttribute("style", "display: none");
    loginLabel.setAttribute("style", "color:#4eca64");
    login.setAttribute("style", "border-color:#4eca64");
    passwordLabel.setAttribute("style", "color:#4eca64");
    password.setAttribute("style", "border-color:#4eca64");

    // let token =
    //   Math.random().toString(16).substring(2) +
    //   Math.random().toString(16).substring(2);
    // localStorage.setItem("token", token);

    setTimeout(() => {
      window.location.href = "2fa.php";
    }, 3000);

    localStorage.setItem("userLogin", JSON.stringify(userValid));
  } else {
    loginLabel.setAttribute("style", "color:red");
    login.setAttribute("style", "border-color:red");
    passwordLabel.setAttribute("style", "color:red");
    password.setAttribute("style", "border-color:red");
    msgError.setAttribute("style", "display: block");
    msgError.innerHTML = "Login ou senha incorretos";
    login.focus();
  }
});

function errorInput(input, message) {
  const formItem = input.parentElement;
  const textMessage = formItem.querySelector("small");

  textMessage.innerText = message;

  formItem.className = "form-content error";
}
