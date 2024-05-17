const login = document.querySelector("#login");
const password = document.querySelector("#password");

const form = document.querySelector("#form");

const btn = document.querySelector("#seePassword");
const btnHidden = document.querySelector("#hidePassword");

const btnConfirm = document.querySelector("#seePasswordTwo");
const btnConfirmHidden = document.querySelector("#hidePasswordTwo");

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
  // Chame a função para validar o formulário
  if (!validateForm()) {
    // Se a validação falhar, impeça o envio do formulário
    event.preventDefault();

    const firstInvalidInput = document.querySelector(
      ".form-content.error input"
    );

    // Rola a página até o primeiro campo com erro
    firstInvalidInput.scrollIntoView({ behavior: "smooth" });
  }
});

// Valida o login
function checkInputLogin() {
  const loginValue = login.value.trim();

  if (loginValue === "") {
    errorInput(login, "Login é obrigatório.");
    validLogin = false;
    return false;
  } else if (loginValue.length != 6) {
    errorInput(login, "Login precisa ter exatamente 6 caracteres.");
    validLogin = false;
    return false;
  } else {
    successInput(login);
    validLogin = true;
    return true;
  }
}

// Exibir erro/sucesso ao digitar
login.addEventListener("input", () => {
  checkInputLogin();
});

// Exibir erro/sucesso ao tirar o foco
login.addEventListener("blur", () => {
  checkInputLogin();
});

function checkInputPassword() {
  const passwordValue = password.value.trim();

  if (passwordValue === "") {
    errorInput(password, "Senha é obrigatório.");
    validPassword = false;
    return false;
  } else if (passwordValue.length != 8) {
    errorInput(password, "Senha precisa ter exatamente 8 caracteres.");
    validPassword = false;
    return false;
  } else {
    successInput(password);
    validPassword = true;
    return true;
  }
}

// Exibir erro/sucesso ao digitar
password.addEventListener("input", () => {
  checkInputPassword();
});

// Exibir erro/sucesso ao tirar o foco
password.addEventListener("blur", () => {
  checkInputPassword();
});

// Imprimir mensagem de erro
function errorInput(input, message) {
  console.log("Exibindo mensagem de erro:", message);
  const formItem = input.parentElement;
  let small = formItem.querySelector("small");

  if (!small) {
    small = document.createElement("small");
    formItem.appendChild(small);
  }

  small.innerText = message;
  formItem.className = "form-content error";
}

// Sucesso
function successInput(input) {
  console.log("Removendo mensagem de erro.");
  const formItem = input.parentElement;
  formItem.classList.remove("error");
  formItem.classList.add("success");
}

function validateForm() {
  // Chame todas as funções de validação individual para cada campo
  const isPasswordValid = checkInputPassword();
  const isLoginValid = checkInputLogin();

  // Verifique se todas as validações são verdadeiras
  // Se alguma delas falhar, retorne false
  return isPasswordValid && isLoginValid;
}
