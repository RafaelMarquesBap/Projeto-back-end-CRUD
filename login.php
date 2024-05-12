
<!DOCTYPE html>
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
    <link rel="shortcut icon" href="imagens/iconeR(1).jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/login.css" />
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
          <li class="nav-item">
            <a class="nav-link text-light" href="./login.php"
              >Área do Cliente</a
            >
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
      <p class="p1">Área do Cliente</p>
    </div>
    <section class="form_do_fael">
      <div class="main-form-container">
        <div class="form-container">
          <section class="form-header">
            <h1>Login</h1>
            <h2>Ninguém irá compartilhar seus dados.</h2>
          </section>
          <div>
          <?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) {
            echo "<p class='msgError'>Erro: Necessário preencher todos os campos!</p>";
        } else {
            $stmt = $conn->prepare("SELECT * FROM tb_Usuarios WHERE login = :login AND Senha = md5(:senha)");
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $password);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario) {
                echo "<p class='msgSuccess'>Login realizado com sucesso!</p>";
                header("Location: 2fa.php");
            } else {
                echo "<p class='msgError'>Erro: Login e/ou senha incorretos!</p>";
            }
        }
    } else {
        echo "<p class='msgError'>Erro: Necessário preencher todos os campos!</p>";
    }
}
?>

          </div>
          <form class="form" id="form" action="" method="POST">
            <div class="form-content">
              <label id="loginLabel" for="login">Login</label>
              <input type="text" id="login" placeholder="" name="login"  />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label id="passwordLabel" for="password">Senha</label>
              <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
              <i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>
              <input type="password" id="password" name="password" placeholder=""  />
              <small>Mensagem de erro</small>
            </div>
            <button id="btnLogin" type="submit">Entrar</button>
          </form>
          <div class="form-section">
            <p>
              Não tem uma conta? <a href="area_cliente.php">Cadastre-se</a>
            </p>
            <p>
              Esqueceu sua senha? <a href="area_cliente.php">Recupere aqui!</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="rodape">
        <a class="" href="#"
          ><img
            src="imagens/logoR.png"
            alt="Logo Empresa O Rafaelo"
            width="180"
            height="40"
            class="pl-3 mt-2"
        /></a>
        <div class="nav justify-contente-center">
          <ul class="nav flex-column pl-3">
            <li class="nav-item">
              <a class="nav-link active text-light" href="#home"
                >Voltar ao Topo</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="index.php#produtos"
                >Produtos</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="index.php#somos"
                >Quem somos</a
              >
            </li>
          </ul>
          <ul class="nav flex-column pl-3">
            <li class="nav-item">
              <a class="nav-link text-light" href="area_cliente.php"
                >Área do Cliente</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="login.php"
                >Login do Cliente</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-light"
                target="_blank"
                href="https://www.linkedin.com/jobs/search/?currentJobId=3705655194&f_C=247287&geoId=92000000&origin=COMPANY_PAGE_JOBS_CLUSTER_EXPANSION&originToLandingJobPostings=3705655194%2C3700622102%2C3622560732%2C3622564292%2C3705680774%2C3650056400%2C3622563163%2C3622560179%2C3650056329"
                >Trabalhe Conosco</a
              >
            </li>
          </ul>
          <ul class="nav flex-column pl-1"></ul>
            <li class="nav-item">
              <a class="nav-link text-light" href="index.php#lancamentos"
                >Lançamentos</a
              >
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="js/dark_mode.js"></script>
  </body>
</html>

<?php



/*if(isset($_POST['login'])) {

  $login = ($conn, $_POST['login']);
  $password = ($conn, $_POST['password']);

  $sql = "SELECT * FROM tb_Usuarios WHERE Login = '$login' AND Senha = '$password'";
  echo "<br><h6>$sql</h6>";

  if($resultado = mysqli_query($conn, $sql)) {
    if($num_registros = mysqli_num_rows($resultado)) {

      $linha = mysqli_fetch_assoc($resultado);
      session_start();
      $_SESSION['login'] = $login;
      header("Location: 2fa.php");

    } else {
      echo "Login inválido!";
    }
}
}*/


?>