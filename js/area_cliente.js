const form = document.getElementById("form");

const username = document.getElementById("username");

const birthday = document.getElementById("birthday");

const gender = document.getElementById("gender");

const momname = document.getElementById("momname");

const cpf = document.getElementById("cpf");

const telnumber = document.getElementById("telnumber");

const celnumber = document.getElementById("celnumber");

const cep = document.querySelector("#cep");
const address = document.querySelector("#address");
const bairro = document.querySelector("#bairro");
const complemento = document.querySelector("#complemento");
const uf = document.querySelector("#uf");
const cidade = document.querySelector("#cidade");
const message = document.querySelector("#message");

const login = document.getElementById("login");

const password = document.getElementById("password");

const passwordtwo = document.getElementById("passwordtwo");

const msgError = document.querySelector("#msgError");
const msgSuccess = document.querySelector("#msgSuccess");

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

btnConfirm.addEventListener("click", () => {
  const inputPassword = document.querySelector("#passwordtwo");
  btnConfirm.setAttribute("style", "visibility: hidden");
  btnConfirmHidden.setAttribute("style", "visibility: visible");

  if (inputPassword.getAttribute("type") == "password") {
    inputPassword.setAttribute("type", "text");
  } else {
    inputPassword.setAttribute("type", "password");
  }
});

btnConfirmHidden.addEventListener("click", () => {
  const inputPassword = document.querySelector("#passwordtwo");
  btnConfirmHidden.setAttribute("style", "visibility: hidden");
  btnConfirm.setAttribute("style", "visibility: visible");

  if (inputPassword.getAttribute("type") == "password") {
    inputPassword.setAttribute("type", "text");
  } else {
    inputPassword.setAttribute("type", "password");
  }
});

form.addEventListener("submit", (event) => {
  console.log("Evento de envio do formulário acionado.");

  // Verificar o formulário
  if (!checkForm()) {
    // Se o formulário não estiver válido, impedir o envio padrão
    event.preventDefault();
    console.log("Formulário não válido. Envio impedido.");
  } else {
    // Se o formulário estiver válido, permitir o envio padrão
    // Aqui você pode colocar qualquer lógica adicional que deseja executar antes de enviar o formulário
    // Por exemplo, você pode adicionar código para enviar os dados para o servidor
    console.log("Formulário válido. Enviando formulário...");
  }
});

username.addEventListener("blur", () => {
  checkInputUsername();
});
username.addEventListener("keyup", () => {
  checkInputUsername();
});

birthday.addEventListener("blur", () => {
  checkInputBirthday();
});

gender.addEventListener("blur", () => {
  checkInputGender();
});

momname.addEventListener("blur", () => {
  checkInputMomName();
});
momname.addEventListener("keyup", () => {
  checkInputMomName();
});

cpf.addEventListener("blur", () => {
  checkInputCpf();
});
cpf.addEventListener("keyup", () => {
  checkInputCpf();
});

//------------------------MÁSCARA DO CPF------------------
cpf.addEventListener("input", () => {
  // Remover os caracteres não númericos usando a expressão regular /\D/g e limitar a 11 digitos.
  var clearValue = cpf.value.replace(/\D/g, "").substring(0, 11);

  // Dividir a string em um array de caracteres individuais.
  var arrayNumbers = clearValue.split("");

  // Criar uma varíavel para receber o número formatado.
  var formattedNumber = "";

  // (12) 94567-8910
  // Acessa o IF quando a quantidade de números é maior do que zero.
  if (arrayNumbers.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `${arrayNumbers.slice(0, 3).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que três.
  if (arrayNumbers.length > 3) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `.${arrayNumbers.slice(3, 6).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que seis.
  if (arrayNumbers.length > 6) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `.${arrayNumbers.slice(6, 9).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que nove.
  if (arrayNumbers.length > 9) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `-${arrayNumbers.slice(9, 11).join("")}`;
  }

  // Enviar para o campo o número formatado.
  cpf.value = formattedNumber;
});

celnumber.addEventListener("blur", () => {
  checkInputCelNumber();
});

//--------------------------MÁSCARA DO TELEFONE CELULAR----------------------
celnumber.addEventListener("input", () => {
  //Remover os caracteres não númericos usando a expressão regular /\D/g e limitar a 13 dígitos.
  var clearValue = celnumber.value.replace(/\D/g, "").substring(0, 13);

  // Dividir a string em um array de caracteres individuais.
  var arrayNumbers = clearValue.split("");

  // Criar uma varíavel para receber o número formatado.
  var formattedNumber = "";

  // (12) 94567-8910
  // Acessa o IF quando a quantidade de números é maior do que zero.
  if (arrayNumbers.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `+${arrayNumbers.slice(0, 2).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que dois.
  if (arrayNumbers.length > 2) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += ` (${arrayNumbers.slice(2, 4).join("")})`;
  }

  // Acessa o IF quando a quantidade de números é maior do que sete.
  if (arrayNumbers.length > 4) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += ` ${arrayNumbers.slice(4, 9).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que 9.
  if (arrayNumbers.length > 9) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `-${arrayNumbers.slice(9, 13).join("")}`;
  }

  // Enviar para o campo o número formatado.
  celnumber.value = formattedNumber;
});

telnumber.addEventListener("blur", () => {
  checkInputTelNumber();
});

//-----------------------------MÁSCARA DO TELEFONE FIXO---------------------------
telnumber.addEventListener("input", () => {
  // Remover os caracteres não númericos usando a expressão regular /\D/g e limitar a 11 digitos.
  var clearValue = telnumber.value.replace(/\D/g, "").substring(0, 13);

  // Dividir a string em um array de caracteres individuais.
  var arrayNumbers = clearValue.split("");

  // Criar uma varíavel para receber o número formatado.
  var formattedNumber = "";

  // (12) 94567-8910
  // Acessa o IF quando a quantidade de números é maior do que zero.
  if (arrayNumbers.length > 0) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `+${arrayNumbers.slice(0, 2).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que dois.
  if (arrayNumbers.length > 2) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += ` (${arrayNumbers.slice(2, 4).join("")}) `;
  }

  // Acessa o IF quando a quantidade de números é maior do que seis.
  if (arrayNumbers.length > 4) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `${arrayNumbers.slice(4, 8).join("")}`;
  }

  // Acessa o IF quando a quantidade de números é maior do que seis.
  if (arrayNumbers.length > 8) {
    // Formatar o DD e concatenar o valor
    // slice - extraie uma parte do array
    // join - unir os elementos do array em uma única string
    formattedNumber += `-${arrayNumbers.slice(8, 12).join("")}`;
  }
  // Enviar para o campo o número formatado.
  telnumber.value = formattedNumber;
});

cep.addEventListener("blur", () => {
  checkInputCep();
});

cep.addEventListener("focusout", async () => {
  try {
    const onlyNumbers = /^[0-9]+$/;
    const cepValid = /^[0-9]{8}$/;

    if (!onlyNumbers.test(cep.value) || !cepValid.test(cep.value)) {
      throw { cep_error: "CEP inválido." };
    }

    const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);

    if (!response.ok) {
      throw await response.json();
    }

    const responseCep = await response.json();

    address.value = responseCep.logradouro;
    bairro.value = responseCep.bairro;
    cidade.value = responseCep.localidade;
    complemento.value = responseCep.complemento;
    uf.value = responseCep.uf;

    successInput(address);
    successInput(bairro);
    successInput(cidade);
    successInput(uf);
  } catch (error) {
    if (error?.cep_error) {
      message.textContent = error.cep_error;
      setTimeout(() => {
        message.textContent = "";
      }, 5000);
    }
    console.log(error);
  }
});

address.addEventListener("blur", () => {
  checkInputAddress();
});

complemento.addEventListener("blur", () => {
  checkInputComplemento();
});

bairro.addEventListener("blur", () => {
  checkInputBairro();
});

cidade.addEventListener("blur", () => {
  checkInputCidade();
});

uf.addEventListener("blur", () => {
  checkInputUf();
});

password.addEventListener("blur", () => {
  checkInputPassword();
});
password.addEventListener("keyup", () => {
  checkInputPassword();
});

passwordtwo.addEventListener("blur", () => {
  checkInputPasswordTwo();
});
passwordtwo.addEventListener("keyup", () => {
  checkInputPasswordTwo();
});

login.addEventListener("blur", () => {
  checkInputLogin();
});
login.addEventListener("keyup", () => {
  checkInputLogin();
});

// ----------------VERIFICAR SE O NOME ESTÁ CORRETO-----------------------
function checkInputUsername() {
  const usernameValue = username.value;
  const usernameRegex = new RegExp(
    /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/
  );

  if (usernameValue === "") {
    errorInput(username, "Nome do usuário é obrigatório.");
    validUsername = false;
    return false; // Retorna false se a validação falhar
  } else if (usernameValue.length < 15) {
    errorInput(
      username,
      "O nome do usuário precisa ter no mínimo 15 caracteres."
    );
    validUsername = false;
    return false; // Retorna false se a validação falhar
  } else if (usernameValue.length > 80) {
    errorInput(
      username,
      "O nome do usuário não pode ultrapassar 80 caracteres."
    );
    validUsername = false;
    return false; // Retorna false se a validação falhar
  } else {
    successInput(username);
    validUsername = true;
    return true; // Retorna true se a validação for bem-sucedida
  }
}

// ----------------VERIFICAR SE DATA DE NASCIMENTO ESTÁ CORRETO-----------------------
function checkInputBirthday() {
  const birthdayValue = birthday.value;

  if (birthdayValue === "") {
    errorInput(birthday, "Data de nascimento é obrigatória.");
    validBirthday = false;
    return false;
  } else {
    successInput(birthday);
    validBirthday = true;
    return true;
  }
}

// ----------------VERIFICAR SE GENÊRO ESTÁ CORRETO-----------------------
function checkInputGender() {
  const genderValue = gender.value;

  if (genderValue === "") {
    errorInput(gender, "Sexo é obrigatório.");
    validGender = false;
    return false;
  } else {
    successInput(gender);
    validGender = true;
    return true;
  }
}

function checkInputMomName() {
  const momnameValue = momname.value;

  if (momnameValue === "") {
    errorInput(momname, "Nome materno é obrigatório.");
    validMomName = false;
    return false;
  } else if (momnameValue.length < 6) {
    errorInput(momname, "O nome materno precisa ter no minimo 6 caracteres.");
    validMomName = false;
    return false;
  } else {
    successInput(momname);
    validMomName = true;
    return true;
  }
}

//-----------------VERIFICAÇÃO DO CPF--------------------------
function checkInputCpf() {
  const cpfValue = cpf.value;
  const cpfRegex = /^(?:\d{3}\.){2}\d{3}-\d{2}$/;

  if (cpfValue === "") {
    errorInput(cpf, "CPF é obrigatório.");
    validCPF = false;
    return false;
  } else if (!cpfRegex.test(cpfValue)) {
    errorInput(cpf, "Preencha um CPF válido!");
    validCPF = false;
    return false;
  } else if (!isCPF(cpfValue)) {
    errorInput(cpf, "Preencha um CPF válido!");
    validCPF = false;
    return false;
  } else if (hasAllDigitsEqual(cpfValue.replace(/\D/g, ""))) {
    errorInput(cpf, "Preencha um CPF válido!");
    validCPF = false;
    return false;
  } else {
    successInput(cpf);
    validCPF = true;
    return true;
  }
}

function hasAllDigitsEqual(cpf) {
  const firstDigit = cpf.charAt(0);
  return cpf.split("").every((digit) => digit === firstDigit);
}

function isCPF(cpf) {
  cpf = cpf.replace(/\.|-/g, "");
  soma = 0;
  soma += cpf[0] * 10;
  soma += cpf[1] * 9;
  soma += cpf[2] * 8;
  soma += cpf[3] * 7;
  soma += cpf[4] * 6;
  soma += cpf[5] * 5;
  soma += cpf[6] * 4;
  soma += cpf[7] * 3;
  soma += cpf[8] * 2;
  soma = (soma * 10) % 11;
  if (soma == 10 || soma == 11) soma = 0;
  if (soma != cpf[9]) return false;

  soma = 0;
  soma += cpf[0] * 11;
  soma += cpf[1] * 10;
  soma += cpf[2] * 9;
  soma += cpf[3] * 8;
  soma += cpf[4] * 7;
  soma += cpf[5] * 6;
  soma += cpf[6] * 5;
  soma += cpf[7] * 4;
  soma += cpf[8] * 3;
  soma += cpf[9] * 2;
  soma = (soma * 10) % 11;
  if (soma == 10 || soma == 11) soma = 0;
  if (soma != cpf[10]) return false;
  return true;
}

//-----------------------VERIFICAÇÃO DO TELEFONE CELULAR========================
function checkInputCelNumber() {
  const celnumberValue = celnumber.value;

  if (celnumberValue === "") {
    errorInput(celnumber, "Telefone celular é obrigatório.");
    validCelNumber = false;
    return false;
  } else {
    successInput(celnumber);
    validCelNumber = true;
    return true;
  }
}

//============================VERIFICAÇÃO DO TELEFONE FIXO==================
function checkInputTelNumber() {
  const telnumberValue = telnumber.value;

  if (telnumberValue === "") {
    errorInput(telnumber, "Telefone fixo é obrigatório.");
    validTelNumber = false;
    return false;
  } else {
    successInput(telnumber);
    validTelNumber = true;
    return true;
  }
}

//===================VERIFICAÇÃO DO CEP==========================
function checkInputCep() {
  const cepValue = cep.value;

  if (cepValue === "") {
    errorInput(cep, "CEP é obrigatório.");
    validCep = false;
    return false;
  } else if (cepValue.length != 8) {
    errorInput(cep, "CEP inválido.");
    validCep = false;
    return false;
  } else {
    successInput(cep);
    validCep = true;
    return true;
  }
}
//==================== VERIFICAÇÃO ENDEREÇO ==============
function checkInputAddress() {
  const addressValue = address.value;

  if (addressValue.trim() !== "") {
    successInput(address);
    return true;
  }
}

//==================== VERIFICAÇÃO COMPLEMENTO ==============
function checkInputComplemento() {
  const complementoValue = complemento.value;

  if (complementoValue.trim() !== "") {
    successInput(complemento);
    return true;
  }
}

//==================== VERIFICAÇÃO BAIRRO ==============
function checkInputBairro() {
  const bairroValue = bairro.value;

  if (bairroValue.trim() !== "") {
    successInput(bairro);
    return true;
  }
}

//==================== VERIFICAÇÃO CIDADE ==============
function checkInputCidade() {
  const cidadeValue = cidade.value;

  if (cidadeValue.trim() !== "") {
    successInput(cidade);
    return true;
  }
}

//==================== VERIFICAÇÃO UF ==============
function checkInputUf() {
  const ufValue = uf.value;

  if (ufValue.trim() !== "") {
    successInput(uf);
    return true;
  }
}

//==============================VERIFICAÇÃO DO LOGIN=====================
function checkInputLogin() {
  const loginValue = login.value;

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

//============================VERIFICAÇÃO DA SENHA======================
function checkInputPassword() {
  const passwordValue = password.value;

  if (passwordValue === "") {
    errorInput(password, "Senha é obrigatório.");
    validPassword = false;
    return false;
  } else if (passwordValue.length != 8) {
    errorInput(password, "A senha precisa ter exatamento 8 caracteres.");
    validPassword = false;
    return false;
  } else {
    successInput(password);
    validPassword = true;
    return true;
  }
}

//===========================VERIFICAÇÃO DA CONFIRMAÇÃO DA SENHA===============
function checkInputPasswordTwo() {
  const passwordtwoValue = passwordtwo.value;
  const passwordValue = password.value;

  if (passwordtwoValue === "") {
    errorInput(passwordtwo, "Confirmar senha é obrigatório.");
    validPasswordTwo = false;
    return false;
  } else if (passwordtwoValue !== passwordValue) {
    errorInput(passwordtwo, "As senhas não são iguais.");
    validPasswordTwo = false;
    return false;
  } else {
    successInput(passwordtwo);
    validPasswordTwo = true;
    return true;
  }
}

//========================VERIFICAÇÃO DO FORMULÁRIO (TUDO CORRETO)=======
function checkForm() {
  console.log("Verificando formulário...");

  // Verifica cada campo individualmente
  const isUsernameValid = checkInputUsername();
  const isBirthdayValid = checkInputBirthday();
  const isGenderValid = checkInputGender();
  const isMomNameValid = checkInputMomName();
  const isCpfValid = checkInputCpf();
  const isCelNumberValid = checkInputCelNumber();
  const isTelNumberValid = checkInputTelNumber();
  const isLoginValid = checkInputLogin();
  const isPasswordValid = checkInputPassword();
  const isPasswordTwoValid = checkInputPasswordTwo();
  const isCepValid = checkInputCep();
  const isAddressValid = checkInputAddress();
  const isComplementoValid = checkInputComplemento();
  const isBairroValid = checkInputBairro();
  const isCidadeValid = checkInputCidade();
  const isUfValid = checkInputUf();

  // Verifica se todas as validações passaram
  const todasValidacoesPassaram =
    isUsernameValid &&
    isBirthdayValid &&
    isGenderValid &&
    isMomNameValid &&
    isCpfValid &&
    isCelNumberValid &&
    isTelNumberValid &&
    isLoginValid &&
    isPasswordValid &&
    isPasswordTwoValid &&
    isCepValid &&
    isAddressValid &&
    isComplementoValid &&
    isBairroValid &&
    isCidadeValid &&
    isUfValid;

  console.log("Todas as validações passaram?", todasValidacoesPassaram);

  return todasValidacoesPassaram;
}

const formItems = form.querySelectorAll(".form-content");

const isValid = [...formItems].every((item) => {
  return item.className === "form-content success";
});
if (isValid) {
  let userList = JSON.parse(localStorage.getItem("userList") || "[]");

  userList.push({
    loginCad: login.value,
    passwordCad: password.value,
  });

  localStorage.setItem("userList", JSON.stringify(userList));

  msgSuccess.setAttribute("style", "display: block");
  msgSuccess.innerHTML = "<strong>Cadastrando usuário...</strong>";
  msgError.innerHTML = "";
  msgError.setAttribute("style", "display: none");

  /*setTimeout(() => {
    window.location.href = "cadastrar.php";
  }, 3000);*/
} else {
  msgError.setAttribute("style", "display: block");
  msgError.innerHTML =
    "<strong>Preencha todos os campos corretamente antes de cadastrar</strong>";
  msgSuccess.innerHTML = "";
  msgSuccess.setAttribute("style", "display: none");
}

function errorInput(input, message) {
  const formItem = input.parentElement;
  const textMessage = formItem.querySelector("small");

  textMessage.innerText = message;

  formItem.className = "form-content error";
}

function successInput(input) {
  const formItem = input.parentElement;

  formItem.className = "form-content success";
}
