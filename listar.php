<?php
session_start();
ob_start();
require_once "conexao.php";

// Verificação de sessão e autenticação do usuário
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$tipo_usuario = $_SESSION['tipo_usuario'];

// Verificação do tipo de usuário
if ($tipo_usuario !== "M") {
    header("Location: index.php");
    exit();
}

// Verificação do 2FA
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true || !isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    unset($_SESSION['usuario_logado']);
    unset($_SESSION['usuario_autenticado']);
    header('Location: login.php');
    exit();
}

// Receber o numero da página
$pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

// Setar a quantidade de registros por página
$limite_resultado = 10;

// Calcular o início da visualização
$inicio = ($limite_resultado * $pagina) - $limite_resultado;

// Fazer a pesquisa
$data = !empty($_GET['search']) ? $_GET['search'] : '';

if ($data) {
    $stmt = $conn->prepare("SELECT * FROM tb_Usuarios WHERE NomeCompleto LIKE :data ORDER BY idUsuario DESC LIMIT :inicio, :limite");
    $stmt->bindValue(':data', '%' . $data . '%', PDO::PARAM_STR);
} else {
    $stmt = $conn->prepare("SELECT * FROM tb_Usuarios ORDER BY idUsuario DESC LIMIT :inicio, :limite");
}

$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':limite', $limite_resultado, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contar a quantidade de registros no BD para paginação
if ($data) {
    $count_stmt = $conn->prepare("SELECT COUNT(idUsuario) AS num_result FROM tb_Usuarios WHERE NomeCompleto LIKE :data");
    $count_stmt->bindValue(':data', '%' . $data . '%', PDO::PARAM_STR);
} else {
    $count_stmt = $conn->prepare("SELECT COUNT(idUsuario) AS num_result FROM tb_Usuarios");
}

$count_stmt->execute();
$row_qnt_registros = $count_stmt->fetch(PDO::FETCH_ASSOC);
$qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/area_cliente.css">
  <link rel="shortcut icon" href="imagens/iconeR(1).jpg" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>O Rafaelo - Listar</title>
  <style>
    /* Quebrar o texto que ficou vazando da pagina */
    .table td:nth-child(15) {
      word-wrap: break-word;
    }
  </style>
</head>
<body>
<header id="home">
  <nav class="cabecalho1">
    <ul class="nav justify-content-end aling-items-center">
      <li>
        <div class="wrapper">
          <input type="checkbox" name="checkbox" class="switch" id="darkModeToggle"/>
          <label for="darkModeToggle"></label>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" target="_blank" href="https://chat.whatsapp.com/GQYq1I96XdB2KIFWcR5UPe">
          <img src="imagens/whatsapp.png" alt="ìcone do Whatsapp" width="40" height="40"/>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" target="_blank" href="https://www.linkedin.com/in/rafael-marques-baptista/">
          <img src="imagens/linkedin.png" alt="ícone do linkedin " width="40" height="40"/>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" href="index.php#contato">Contato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#endereco">Endereço</a>
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
          <?php if(isset($_SESSION['usuario_logado'])): ?>
          <a class="dropdown-item" href="altera.php">Altere sua senha
          </a>
          <?php endif; ?>
      </li>
            <?php if(isset($_SESSION['usuario_logado'])): ?>
              <li class="nav-item">
            <a class="nav-link text-light" href="#"><?php echo $_SESSION['login'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href=""><?php if($_SESSION['tipo_usuario'] == "M")
            {
              echo "Usuário Master";
            } else {
              echo "Usuário Comum";
            };?></a>
          </li>
              <li class="nav-item">
              <form action="logout.php" method="POST">
              <button type="submit" name="logout" class="log_off">Encerrar sessão</button></li>
              </form>
          </li>
          <?php endif; ?>
    </ul>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light cabecalho2">
    <a class="" href="">
      <img src="imagens/logoR.png" alt="Logo da empresa O Rafaelo" width="100%" height="40"/>
    </a>
    <ul class="navbar-nav">
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
            <a class="dropdown-item" href="listar.php">Visualizar Usuários</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="tela_log.php">Log</a>
          </div>
        </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['usuario_logado'])): ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="mer.php">MER</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="p1">Lista de Usuários</h2>
    </div>
  </div>
  <div class="search-box">
    <input class="form-control w-25 mr-sm-2" type="search" placeholder="Pesquisar" id="pesquisar" aria-label="Pesquisar">
    <button class="btn btn-primary my-2 my-sm-0" onclick="searchData()">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
      </svg>
    </button>
  </div>
  <?php 
  if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="bg-success">
        <tr>
          <th colspan="3" class="text-center">Ações</th>
          <th scope="col">#</th>
          <th scope="col">Tipo de Usuário</th>
          <th scope="col">Nome Completo</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Gênero</th>
          <th scope="col">Nome Materno</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone Celular</th>
          <th scope="col">Telefone Fixo</th>
          <th scope="col">CEP</th>
          <th scope="col">Endereço</th>
          <th scope="col">Número</th>
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">UF</th>
          <th scope="col">Login</th>
          <th scope="col">Senha</th>
        </tr>
      </thead>
      <tbody class="bg-light">
        <?php
        if (!empty($resultado)) {
          foreach ($resultado as $row_usuario) {
            extract($row_usuario);
        ?>
            <tr>
              <td><?php echo "<a href='visualizar.php?id=$idUsuario' class='btn btn-primary btn-sm'>Visualizar</a>"?></td>
              <td><?php echo "<a href='editar.php?id=$idUsuario' class='btn btn-primary btn-sm'>Editar</a>"?></td>
              <td><?php echo "<a href='apagar.php?id=$idUsuario' onclick='return confirmarExclusao()' class='btn btn-danger btn-sm'>Apagar</a>"?></td>
              <td><?php echo $idUsuario; ?></td>
              <td><?php echo $Tipo_usuario; ?></td>
              <td><?php echo $NomeCompleto; ?></td>
              <td><?php echo $DataNasc; ?></td>
              <td><?php echo $Sexo; ?></td>
              <td><?php echo $NomeMaterno; ?></td>
              <td><?php echo $CPF; ?></td>
              <td><?php echo $Telefone_Celular; ?></td>
              <td><?php echo $Telefone_Fixo; ?></td>
              <td><?php echo $CEP; ?></td>
              <td><?php echo $Endereco; ?></td>
              <td><?php echo $Numero; ?></td>
              <td><?php echo $Bairro; ?></td>
              <td><?php echo $Cidade; ?></td>
              <td><?php echo $UF; ?></td>
              <td><?php echo $Login; ?></td>
              <td><?php echo $Senha; ?></td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='19' class='msgError'>Nenhum usuário encontrado!</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <nav>
    <ul class="pagination">
      <?php
      echo "<li class='page-item'><a class='page-link' href='listar.php?page=1" . ($data ? "&search=$data" : "") . "'>Primeira</a></li> ";
      for ($pagina_anterior = $pagina - 2; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
        if ($pagina_anterior >= 1) {
          echo "<li class='page-item'><a class='page-link' href='listar.php?page=$pagina_anterior" . ($data ? "&search=$data" : "") . "'>$pagina_anterior</a></li> ";
        }
      }

      echo "<li class='page-item active'><span class='page-link'>$pagina</span></li> ";

      for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + 2; $proxima_pagina++) {
        if ($proxima_pagina <= $qnt_pagina) {
          echo "<li class='page-item'><a class='page-link' href='listar.php?page=$proxima_pagina" . ($data ? "&search=$data" : "") . "'>$proxima_pagina</a></li> ";
        }
      }

      echo "<li class='page-item'><a class='page-link' href='listar.php?page=$qnt_pagina" . ($data ? "&search=$data" : "") . "'>Última</a></li> ";
      ?>
    </ul>
  </nav>
</div>
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
<script src="js/apagar.js"></script>
<script>
  const search = document.getElementById('pesquisar');
  search.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    searchData();
  }
});

function searchData() {
  const searchValue = document.getElementById('pesquisar').value;
  window.location.href = `listar.php?search=${searchValue}`;
}
</script>
</body>
</html>
