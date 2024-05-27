const form = document.getElementById("edit-usuario");

const username = document.getElementById("NomeCompleto");

const birthday = document.getElementById("DataNasc");

const gender = document.getElementById("Sexo");

const momname = document.getElementById("NomeMaterno");

const cpf = document.getElementById("CPF");

const telnumber = document.getElementById("Telefone_Fixo");

const celnumber = document.getElementById("Telefone_Celular");

const cep = document.getElementById("CEP");
const address = document.getElementById("Endereco");
const number = document.getElementById("Number");
const bairro = document.getElementById("Bairro");
const complemento = document.getElementById("Complemento");
const uf = document.getElementById("UF");
const cidade = document.getElementById("Cidade");
const message = document.querySelector("small");

const login = document.getElementById("Login");

const password = document.getElementById("Password");

const passwordtwo = document.getElementById("ConfirmPassword");

const msgError = document.getElementById("msgError");
const msgSuccess = document.getElementById("msgSuccess");

const btn = document.getElementById("seePassword");
const btnHidden = document.getElementById("hidePassword");

const btnConfirm = document.getElementById("seePasswordTwo");
const btnConfirmHidden = document.getElementById("hidePasswordTwo");

// MASCARA DO CPF =====================

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

// ================ MÁSCARA DO TELEFONE FIXO ====================
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

username.addEventListener("blur", () => {
  console.log("Blur detectado no campo de usuário.");
  checkInputUsername();
});

birthday.addEventListener("input", () => {
  console.log("Blur detectado no campo de usuário.");
  checkInputBirthday();
});

birthday.addEventListener("blur", () => {
  console.log("Blur detectado no campo de usuário.");
  checkInputBirthday();
});

username.addEventListener("input", () => {
  console.log("Blur detectado no campo de usuário.");
  checkInputUsername();
});

momname.addEventListener("blur", () => {
  checkInputMomName();
});

momname.addEventListener("input", () => {
  checkInputMomName();
});

gender.addEventListener("blur", () => {
  checkInputGender();
});

gender.addEventListener("input", () => {
  checkInputGender();
});

cpf.addEventListener("blur", () => {
  checkInputCpf();
});

cpf.addEventListener("input", () => {
  checkInputCpf();
});

celnumber.addEventListener("input", () => {
  checkInputCelNumber();
});

celnumber.addEventListener("blur", () => {
  checkInputCelNumber();
});

telnumber.addEventListener("input", () => {
  checkInputTelNumber();
});

telnumber.addEventListener("blur", () => {
  checkInputTelNumber();
});

cep.addEventListener("input", () => {
  checkInputCep();
});

cep.addEventListener("blur", () => {
  checkInputCep();
});

address.addEventListener("blur", () => {
  checkInputAddress();
});

number.addEventListener("blur", () => {
  checkInputNumber();
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

login.addEventListener("input", () => {
  checkInputLogin();
});

login.addEventListener("blur", () => {
  checkInputLogin();
});

function checkInputUsername() {
  console.log("Verificando o campo de usuário...");
  const usernameValue = username.value.trim();
  const usernameRegex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

  if (usernameValue === "") {
    console.log("Nome de usuário em branco. Exibindo mensagem de erro.");
    errorInput(username, "Nome do usuário é obrigatório.");
    return false;
  } else if (usernameValue.length < 15) {
    console.log(
      "Nome de usuário com menos de 15 caracteres. Exibindo mensagem de erro."
    );
    errorInput(
      username,
      "O nome do usuário precisa ter no mínimo 15 caracteres."
    );
    return false;
  } else if (usernameValue.length > 80) {
    console.log(
      "Nome de usuário com mais de 80 caracteres. Exibindo mensagem de erro."
    );
    errorInput(
      username,
      "O nome do usuário não pode ultrapassar 80 caracteres."
    );
    return false;
  } else {
    console.log("Nome de usuário válido. Removendo mensagem de erro.");
    successInput(username);
    return true;
  }
}

// ----------------VERIFICAR SE DATA DE NASCIMENTO ESTÁ CORRETO-----------------------
function checkInputBirthday() {
  const birthdayValue = birthday.value;
  const dataNascimento = new Date(birthdayValue);
  const dataAtual = new Date();

  // Verifica se o valor está vazio
  if (birthdayValue === "") {
    errorInput(birthday, "Data de nascimento é obrigatória.");
    validBirthday = false;
    return false;
  }

  // Verifica se a data é válida
  if (isNaN(dataNascimento.getTime())) {
    errorInput(birthday, "Data de nascimento inválida.");
    validBirthday = false;
    return false;
  }

  // Verifica se a data de nascimento é no futuro
  if (dataNascimento > dataAtual) {
    errorInput(birthday, "Data de nascimento inválida.");
    validBirthday = false;
    return false;
  }

  // Verifica se a data de nascimento é inferior ao ano de 1900
  if (dataNascimento.getFullYear() < 1900) {
    errorInput(birthday, "Data de nascimento inválida.");
    validBirthday = false;
    return false;
  }
  // Se todas as verificações passarem
  successInput(birthday);
  validBirthday = true;
  return true;
}

function checkInputGender() {
  const genderValue = gender.value.trim();

  if (genderValue === "") {
    errorInput(gender, "Sexo é obrigatório.");
    validGender = false;
    return false;
  } else if (
    genderValue !== "Feminino" &&
    genderValue !== "Masculino" &&
    genderValue !== "Prefiro não responder."
  ) {
    errorInput(
      gender,
      "Sexo só pode ser Feminino, Masculino ou Prefiro não responder."
    );
    validGender = false;
    return false;
  } else {
    successInput(gender);
    validGender = true;
    return true;
  }
}

function checkInputMomName() {
  const momnameValue = momname.value.trim();

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

function checkInputCelNumber() {
  const celnumberValue = celnumber.value.trim().replace(/\D/g, "");

  if (celnumberValue === "+55" || celnumberValue === "") {
    errorInput(celnumber, "Telefone celular é obrigatório.");
    validCelNumber = false;
    return false;
  } else if (celnumberValue.length !== 13) {
    errorInput(celnumber, "Informe um número de telefone celular válido.");
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
  const telnumberValue = telnumber.value.trim().replace(/\D/g, "");

  if (telnumberValue === "+55" || telnumberValue === "") {
    errorInput(telnumber, "Telefone fixo é obrigatório.");
    validTelNumber = false;
    return false;
  } else if (telnumberValue.length !== 12) {
    errorInput(telnumber, "Informe um número de telefone fixo válido.");
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

// =================== VERIFICAÇÃO NÚMERO ===========
function checkInputNumber() {
  const numberValue = number.value;

  if (numberValue.trim() !== "") {
    successInput(number);
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

function successInput(input) {
  console.log("Removendo mensagem de erro.");
  const formItem = input.parentElement;
  formItem.classList.remove("error");
  formItem.classList.add("success");
}

// Adicione um ouvinte de evento de envio de formulário ao formulário
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

// Função para validar o formulário
function validateForm() {
  // Chame todas as funções de validação individual para cada campo
  const isUsernameValid = checkInputUsername();
  const isBirthdayValid = checkInputBirthday();
  const isGenderValid = checkInputGender();
  const isMomNameValid = checkInputMomName();
  const isCpfValid = checkInputCpf();
  const isCelNumberValid = checkInputCelNumber();
  const isTelNumberValid = checkInputTelNumber();
  const isCepValid = checkInputCep();
  const isAddressValid = checkInputAddress();
  const isNumberValid = checkInputNumber();
  const isComplementoValid = checkInputComplemento();
  const isBairroValid = checkInputBairro();
  const isCidadeValid = checkInputCidade();
  const isUfValid = checkInputUf();
  const isLoginValid = checkInputLogin();

  // Verifique se todas as validações são verdadeiras
  // Se alguma delas falhar, retorne false
  return (
    isUsernameValid &&
    isBirthdayValid &&
    isGenderValid &&
    isMomNameValid &&
    isCpfValid &&
    isCelNumberValid &&
    isTelNumberValid &&
    isCepValid &&
    isAddressValid &&
    isNumberValid &&
    isComplementoValid &&
    isBairroValid &&
    isCidadeValid &&
    isUfValid &&
    isLoginValid
  );
}
