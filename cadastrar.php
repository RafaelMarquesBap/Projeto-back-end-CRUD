<?php
session_start();
ob_start();
require_once "conexao.php";
?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/area_cliente.css" />
    <link rel="shortcut icon" href="imagens/iconeR(1).jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>O Rafaelo</title>
  </head>

  <body>
  <header id="home">
      <nav class="cabecalho1">
        <ul class="nav justify-content-end aling-items-center">
          <li>
            <div class="wrapper">
              <input
                type="checkbox"
                name="checkbox"
                class="switch"
                id="darkModeToggle"
              />
              <label for="darkModeToggle"></label>
            </div>
          </li>
          <li class="nav-item">
            <a
              class="nav-link active text-light"
              target="_blank"
              href="https://chat.whatsapp.com/GQYq1I96XdB2KIFWcR5UPe"
              ><img
                src="imagens/whatsapp.png"
                alt="ìcone do Whatsapp"
                width="40"
                height="40"
            /></a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link active text-light"
              target="_blank"
              href="https://www.linkedin.com/in/rafael-marques-baptista/"
              ><img
                src="imagens/linkedin.png"
                alt="ícone do linkedin "
                width="40"
                height="40"
            /></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" href="index.php#contato"
              >Contato</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php#endereco"
              >Endereço</a
            >
          </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
          Área do Cliente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">Acesse sua conta
          </a>
          <a class="dropdown-item" href="area_cliente.php">Se torne um cliente
          </a>
      </li>
          <li class="nav-item"></li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light cabecalho2">
        <a class="" href=""
          ><img
            src="imagens/logoR.png"
            alt="Logo da empresa O Rafaelo"
            width="100%"
            height="40"
        /></a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php#produtos">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php#somos">Quem somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php#lancamentos">Lançamentos</a>
          </li>
          
          
        </ul>
      </nav>
    </header>
  
    <div>
    <?php
if (!isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
  header("Location: login.php");
}

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["username"]) && isset($_POST["birthday"]) && isset($_POST["gender"]) && isset($_POST["momname"]) && isset($_POST["cpf"]) && isset($_POST["celnumber"]) && isset($_POST["telnumber"]) && isset($_POST["cep"]) && isset($_POST["address"]) && isset($_POST["bairro"]) && isset($_POST["cidade"]) && isset($_POST["uf"]) && isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["passwordtwo"])) {
        
        $username = $_POST["username"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $momname = $_POST["momname"];
        $cpf = $_POST["cpf"];
        $celnumber = $_POST["celnumber"];
        $telnumber = $_POST["telnumber"];
        $cep = $_POST["cep"];
        $address = $_POST["address"];
        $complemento = isset($_POST["complemento"]) ? $_POST["complemento"] : "";
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];
        $login = $_POST["login"];
        $password = $_POST["password"];
        $passwordtwo = $_POST["passwordtwo"];
        $tipo_usuario = 'C';
        
        // Criptografar a senha
        $senha_hash = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $sql = $conn->prepare("INSERT INTO tb_Usuarios(NomeCompleto, Tipo_usuario, DataNasc, Sexo, NomeMaterno, CPF, Telefone_Celular, Telefone_Fixo, CEP, Endereco, Complemento, Bairro, Cidade, UF, Login, Senha) VALUES (:username, :tipo_usuario, :birthday, :gender, :momname, :cpf, :celnumber, :telnumber, :cep, :address, :complemento, :bairro, :cidade, :uf, :login, :senha)");

            $sql->bindValue(':username', $username);
            $sql->bindValue(':tipo_usuario', $tipo_usuario);
            $sql->bindValue(':birthday', $birthday);
            $sql->bindValue(':gender', $gender);
            $sql->bindValue(':momname', $momname);
            $sql->bindValue(':cpf', $cpf);
            $sql->bindValue(':celnumber', $celnumber);
            $sql->bindValue(':telnumber', $telnumber);
            $sql->bindValue(':cep', $cep);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':complemento', $complemento);
            $sql->bindValue(':bairro', $bairro);
            $sql->bindValue(':cidade', $cidade);
            $sql->bindValue(':uf', $uf);
            $sql->bindValue(':login', $login);
            $sql->bindValue(':senha', $senha_hash);

            $sql->execute();

            if($sql->rowCount()) {
                echo "<p class='p1'>Bem-vindo(a), $username</p>";
                $_SESSION['msg'] = "<p class='msgSuccess'>Seu cadastro foi efetuado com sucesso!</p>";
                echo "<p class='p1'>Você será redirecionado para a tela de login em alguns segundos...</p>";
                echo "<meta http-equiv='refresh' content='5;url=login.php'>";
            } else {
                echo "<p class='p1'>Usuário não cadastrado!</p>";
                echo "<p class='p1'>Retornando a página de cadastro...</p>";
                echo "<meta http-equiv='refresh' content='3;url=area_cliente.php'>";
            }
        } catch (PDOException $e) {

            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    } else {
        echo "<p class='p1'>Erro: Necessário preencher todos os campos!</p>";
        echo "<p class='p1'>Retornando à página de cadastro...</p>";
        echo "<meta http-equiv='refresh' content='3;url=area_cliente.php'>";
    }
}
?>

    </div>
  </body>
</html>
