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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagens/iconeR(1).jpg" type="image/x-icon" />
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
            <a class="nav-link active text-light" href="#contato">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#endereco">Endereço</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./login.php"
              >Área do Cliente</a
            >
            <li class="nav-item"><button class="log-off" onclick="sair()">Encerrar sessão</button></li>
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
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#produtos">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#somos">Quem somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#lancamentos">Lançamentos</a>
          </li>
          <?php if($tipo_usuario == "M"): ?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
          Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="visualizar.php">Visualizar Usuários
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Algo mais aqui</a>
        </div>
      </li>
      <?php endif; ?>
        </ul>
      </nav>
    </header>
    <div>
      <span class="p1" id="lancamentos">Conheça nossos lançamentos</span>
    </div>
    <section class="carrosel">
      <div
        id="carouselExampleControls"
        class="carousel slide"
        data-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="d-block w-100 img-fluid"
              src="imagens/malbecUltra.jpg"
              alt="Relançamento da Colônia Malbec Ultra Bleu"
            />
          </div>
          <div class="carousel-item">
            <img
              class="d-block w-100 img-fluid"
              src="imagens/egeo.jpg"
              alt="Colônia Egeo E-Joy"
            />
          </div>
          <div class="carousel-item">
            <img
              class="d-block w-100 img-fluid"
              src="imagens/lilas.jpg"
              alt="Produtos lançamentos da linha NativaSPA Lilac"
            />
          </div>
          <div class="carousel-item">
            <img
              class="d-block w-100 img-fluid"
              src="imagens/lizFlora.jpg"
              alt="Lançamento da colônia Liz Flora"
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleControls"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleControls"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>
    </section>
    <div>
      <span class="p1" id="produtos">Conheça os mais vendidos</span>
    </div>
    <section >
      <div class="alinhamentoCards">
        <div class="card">
          <img
            src="imagens/flRed2.jpg"
            alt="Serviço de telefonia"
            width="100%"
          />
          <div class="card__content">
            <p class="card__title">Floratta Red</p>
            <p class="card__description">
              Floratta Red é a combinação da delicadeza da flor da Maçã de Vermont 
              e a doçura do fruto. Uma fragrância feminina que transmite
               atitude e romantismo.<br> Preço: R$149,90
            </p>
          </div>
        </div>
        <div class="card">
          <img
            src="imagens/malbec.jpg"
            alt="Serviço de internet"
            width="100%"
          />
          <div class="card__content">
            <p class="card__title">Malbec Tradicional</p>
            <p class="card__description">
              Com fragrâncias marcantes como um bom vinho, as fragrâncias Malbec são as primeiras do mundo a serem feitas com álcool vínico. 
              Um verdadeiro presente para o homem que sabe apreciar o que há de bom na vida.<br> Preço: R$225,90
            </p>
          </div>
        </div>
        <div class="card">
          <img
            src="imagens/floratta.jpg"
            alt="Serviço de infraestrutura"
            width="100%"
          />
          <div class="card__content">
            <p class="card__title">Floratta Blue</p>
            <p class="card__description">
              

Floratta Blue é uma fragrância super confortável com o
 toque delicado do musk para mulheres que levam a vida
  de forma leve. <br> Preço: R$139.90

            </p>
          </div>
        </div>
      </div>
    </section>
    <div>
      <span class="p1" id="somos">Sobre o Grupo Rafaelo</span>
    </div>
    <section>
      <div class="mapa">
        <img
          src="imagens/banner-sobre-grupo-1.jpg"
          alt="Quem somos"
          width="100%"
          class="img-fluid"
        />
      </div>
      <div>
        <p class="quem-somos">somos o Grupo Boticário e o nosso propósito é criar oportunidades para a beleza transformar<br>
           a vida das pessoas e o mundo ao nosso redor</p>
           <p class="quem-somos-paragrafo">Esse propósito é o que nos conecta com
             o nosso maior tesouro – o nosso cliente – e é também o alicerce que
              ampara as nossas principais conquistas: hoje somos um dos maiores grupos empresariais
               do Brasil, a maior franquia de beleza
             do mundo e temos a marca de cosméticos mais amada do país.</p>
      </div>
    </section>
    <section></section>
    <div>
      <span class="p1" id="contato">Entre em contato</span>
    </div>
    <section class="container-fluid">
      <div class="alinhamentoCards container-fluid">
        <div class="card2">
          <span class="p1">Contato</span>
          <p class="contato-paragrafo">Para qualquer informação, dúvida ou comentário:</p>
          <p class="contato-paragrafo">(21) 9876-5432</p>
          <form class="form2">
            <div class="group2">
              <input placeholder="" type="text" id="nameEmpresa" required="" />
              <label for="nameEmpresa">Nome da Empresa</label>
            </div>
            <div class="group2">
              <input
                placeholder=""
                type="email"
                id="email"
                name="email"
                required=""
              />
              <label for="email">Email Corporativo</label>
            </div>
            <div class="group2">
              <textarea
                placeholder=""
                id="comment"
                name="comment"
                rows="5"
                required=""
              ></textarea>
              <label for="comment">Mensagem</label>
            </div>
            <button type="submit">Enviar</button>
          </form>
        </div>

        <ul class="mt-4" type="none">
          <span class="p1" id="endereco">Escritórios</span>
          <li>
            <p><strong>Brasil</strong></p>
            <p>
              Rua Leopoldina Rego, 666 | Rio de Janeiro, RJ
            </p>
            <p>Av. Pastor Martin Luther King Jr., 126  <br> Del Castilho | Rio de Janeiro, RJ</p>
            <p>Av. Nova York, 40 - Bonsucesso | Rio de Janeiro, RJ</p>
          </li>
        
        </ul>
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
    <script src="js/home.js"></script>
  </body>
</html>
