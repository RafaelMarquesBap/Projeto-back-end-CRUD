<?php
session_start();
if (!isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
  header("Location: login.php");
}
?>
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
    <title>O Rafaelo - Autenticação de Dois Fatores</title>
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
<?php
$_SESSION['pergunta'] = rand(1,3);

$perguntas = $_SESSION['pergunta'];
switch($perguntas):

    case 1:
        echo"<div>";
        echo"<p class='p2'>Área do Cliente</p>";
        echo "</div>";
        echo"<section class='form_do_fael'>";
        echo"<div class='main-form-container'>";
        echo"<div class='form-container'>"; 
        echo"<section class='form-header'>";
        echo"<h1 class='p4'>Confirme seus dados para realizar o login!</h1>";
        echo"<h2 class='p4'>Ninguém irá compartilhar seus dados.</h2>";
        echo"</section>";
        echo"<div id='msgError'></div>";
        echo"<div id='msgSuccess'></div>";
        echo"<form class='form' id='form' action='valida2fa.php' method='POST'>";
        echo"<div class='form-content'>";
        echo"<label id='loginLabel' for='momname'>Qual o nome da sua mãe?</label>";
        echo"<input type='text' id='momname' placeholder='Digite aqui o nome da sua mãe...' name='momname' required />";
        echo"<small>Mensagem de erro</small>";
        echo"</div>";
        echo"<button id='btnLogin' type='submit'>Entrar</button>";
        echo"</form>";
        echo"<div class='form-section'>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</section>";
        break;

    case 2:
        echo"<div>";
        echo"<p class='p2'>Área do Cliente</p>";
        echo "</div>";
        echo"<section class='form_do_fael'>";
        echo"<div class='main-form-container'>";
        echo"<div class='form-container'>"; 
        echo"<section class='form-header'>";
        echo"<h1 class='p4'>Confirme seus dados para realizar o login!</h1>";
        echo"<h2 class='p4'>Ninguém irá compartilhar seus dados.</h2>";
        echo"</section>";
        echo"<div id='msgError'></div>";
        echo"<div id='msgSuccess'></div>";
        echo"<form class='form' id='form' action='valida2fa.php' method='POST'>";
        echo"<div class='form-content'>";
        echo"<label id='loginLabel' for='birthday'>Qual a data do seu nascimento</label>";
        echo"<input type='date' id='birthday' placeholder='Digite aqui a data do seu nascimento?' name='birthday' required />";
        echo"<small>Mensagem de erro</small>";
        echo"</div>";
        echo"<button id='btnLogin' type='submit'>Entrar</button>";
        echo"</form>";
        echo"<div class='form-section'>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</section>";
        break;
        
        case 3:
            echo"<div>";
            echo"<p class='p2'>Área do Cliente</p>";
            echo "</div>";
            echo"<section class='form_do_fael'>";
            echo"<div class='main-form-container'>";
            echo"<div class='form-container'>"; 
            echo"<section class='form-header'>";
            echo"<h1 class='p4'>Confirme seus dados para realizar o login!</h1>";
            echo"<h2 class='p4'>Ninguém irá compartilhar seus dados.</h2>";
            echo"</section>";
            echo"<div id='msgError'></div>";
            echo"<div id='msgSuccess'></div>";
            echo"<form class='form' id='form' action='valida2fa.php' method='POST'>";
            echo"<div class='form-content'>";
            echo"<label id='loginLabel' for='cep'>Qual o CEP do seu endereço?</label>";
            echo"<input type='text' id='cep' placeholder='Digite aqui o CEP do seu endereço...' name='cep' required />";
            echo"<small>Mensagem de erro</small>";
            echo"</div>";
            echo"<button id='btnLogin' type='submit'>Entrar</button>";
            echo"</form>";
            echo"<div class='form-section'>";
            echo"</div>";
            echo"</div>";
            echo"</div>";
            echo"</section>";
            break;
    
    endswitch;

?>

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
    <script src="2fa/login.js"></script>
  </body>
</html>