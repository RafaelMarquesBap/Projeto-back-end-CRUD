const username = document.getElementById("NomeCompleto");

const birthday = document.getElementById("DataNasc");

const gender = document.getElementById("Sexo");

const momname = document.getElementById("NomeMaterno");

const cpf = document.getElementById("CPF");

const telnumber = document.getElementById("Telefone_Fixo");

const celnumber = document.getElementById("Telefone_Celular");

const cep = document.querySelector("#CEP");
const address = document.querySelector("#Endereco");
const bairro = document.querySelector("#Bairro");
const complemento = document.querySelector("#Complemento");
const uf = document.querySelector("#UF");
const cidade = document.querySelector("#Cidade");
const message = document.querySelector("#message");

const login = document.getElementById("Login");

const password = document.getElementById("Senha");

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
