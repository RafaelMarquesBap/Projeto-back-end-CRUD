<?php
          session_start();
          if (isset($_SESSION['username'])) {
            $tipo_usuario = $_SESSION['tipo_usuario'];
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
    <link rel="stylesheet" href="css/area_cliente.css" />
    <link rel="shortcut icon" href="imagens/iconeR(1).jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>O Rafaelo - Cadastro</title>
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
          <?php if($tipo_usuario == "M"): ?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
          Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listar.php">Visualizar Usuários
          </a>
          <a class="dropdown-item" href="area_cliente.php">Cadastrar Usuários
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="mer.php">MER</a>
        </div>
      </li>
      <?php endif; ?>
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
            <h1>Cadastre-se</h1>
            <h2>Crie sua conta de graça com os dados abaixo</h2>
          </section>
          <div id="msgError"></div>
          <div id="msgSuccess"></div>
          <form class="form" id="form" action="cadastrar.php" method="POST">
            <div class="form-content">
              <label for="username">Nome do usuário *</label>
              <input
                type="text"
                name="username"
                id="username"
                placeholder="Digite o nome do usuário..."
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="birthday">Data de Nascimento *</label>
              <input
                type="date"
                name="birthday"
                id="birthday"
                placeholder="Informe sua data de nascimento..."
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="gender">Sexo *</label>
              <select name="gender" id="gender">
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="momname">Nome Materno *</label>
              <input
                type="text"
                name="momname"
                id="momname"
                placeholder="Digite o nome materno..."
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="cpf">CPF *</label>
              <input
                type="text"
                name="cpf"
                id="cpf"
                placeholder="Digite o seu CPF..."
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="celnumber">Telefone Celular *</label>
              <input
                type="text"
                name="celnumber"
                id="celnumber"
                placeholder="+xx (xx) xxxxx-xxxx"
                value="+55"
              />
              
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="telnumber">Telefone Fixo *</label>
              <input
                type="text"
                name="telnumber"
                id="telnumber"
                placeholder="+xx (xx) xxxxx-xxxx"
                value="+55"
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="cep">CEP *</label>
              <input
                type="text"
                name="cep"
                id="cep"
                placeholder="Digite o seu cep..."
              />
              <small id="message"></small>
            </div>
            <div class="form-content">
              <label for="address">Endereço</label>
              <input
                type="text"
                name="address"
                id="address"
                placeholder="Digite o seu endereço..."
              />
              <small>Mensagem de erro</small>
            </div>
            <div class="form-content">
              <label for="complemento">Complemento</label>
              <input
                type="text"
                name="complemento"
                id="complemento"
                placeholder="Exemplo: Apartamento, Casa"
              />
              <small>Mensagem de erro</small>
            </div>
            <div class="form-content">
              <label for="bairro">Bairro</label>
              <input
                type="text"
                name="bairro"
                id="bairro"
                placeholder="Digite o seu bairro..."
              />
              <small>Mensagem de erro</small>
            </div>
            <div class="form-content">
              <label for="cidade">Cidade</label>
              <input
                type="text"
                name="cidade"
                id="cidade"
                placeholder="Digite a sua cidade..."
              />
              <small>Mensagem de erro</small>
            </div>
            
            <div class="form-content">
              <label for="uf">UF</label>
              <select id="uf" name="uf">
  <option value="" disabled selected>Selecione o estado</option>
  <option value="AC">Acre (AC)</option>
  <option value="AL">Alagoas (AL)</option>
  <option value="AP">Amapá (AP)</option>
  <option value="AM">Amazonas (AM)</option>
  <option value="BA">Bahia (BA)</option>
  <option value="CE">Ceará (CE)</option>
  <option value="DF">Distrito Federal (DF)</option>
  <option value="ES">Espírito Santo (ES)</option>
  <option value="GO">Goiás (GO)</option>
  <option value="MA">Maranhão (MA)</option>
  <option value="MT">Mato Grosso (MT)</option>
  <option value="MS">Mato Grosso do Sul (MS)</option>
  <option value="MG">Minas Gerais (MG)</option>
  <option value="PA">Pará (PA)</option>
  <option value="PB">Paraíba (PB)</option>
  <option value="PR">Paraná (PR)</option>
  <option value="PE">Pernambuco (PE)</option>
  <option value="PI">Piauí (PI)</option>
  <option value="RJ">Rio de Janeiro (RJ)</option>
  <option value="RN">Rio Grande do Norte (RN)</option>
  <option value="RS">Rio Grande do Sul (RS)</option>
  <option value="RO">Rondônia (RO)</option>
  <option value="RR">Roraima (RR)</option>
  <option value="SC">Santa Catarina (SC)</option>
  <option value="SP">São Paulo (SP)</option>
  <option value="SE">Sergipe (SE)</option>
  <option value="TO">Tocantins (TO)</option>
</select>

              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="login">Login *</label>
              <input
                type="text"
                name="login"
                id="login"
                placeholder="Digite o seu login..."
              />
              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="password">Senha *</label>
              <i
                id="seePassword"
                class="fa fa-eye fa-lg"
                aria-hidden="true"
              ></i>
              <i
                id="hidePassword"
                class="fa fa-eye-slash fa-lg"
                aria-hidden="true"
              ></i>

              <input
                type="password"
                name="password"
                id="password"
                placeholder="Digite a sua senha..."
                
              />

              <small>Mensagem de erro</small>
            </div>

            <div class="form-content">
              <label for="passwordtwo">Confirmar senha *</label>
              <i
                id="seePasswordTwo"
                class="fa fa-eye fa-lg"
                aria-hidden="true"
              ></i>
              <i
                id="hidePasswordTwo"
                class="fa fa-eye-slash fa-lg"
                aria-hidden="true"
              ></i>

              <input
                type="password"
                name="passwordtwo"
                id="passwordtwo"
                placeholder="Digite a sua senha novamente..."
                
              />

              <small>Mensagem de erro</small>
            </div>

            <button type="submit">Cadastrar</button>
          </form>
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
    <script src="js/area_cliente.js"></script>
    <script src="dark_mode.js"></script>
  </body>
</html>
