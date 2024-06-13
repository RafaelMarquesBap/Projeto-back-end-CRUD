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
$search_nome = !empty($_GET['search_nome']) ? $_GET['search_nome'] : '';
$search_id = !empty($_GET['search_id']) ? $_GET['search_id'] : '';

$query = "SELECT l.idLog, l.DataLogin, l.Tipo2FA, l.idUsuario, u.NomeCompleto AS NomeUsuario, l.Status, l.Resposta2FA 
          FROM tb_Log l 
          JOIN tb_Usuarios u ON l.idUsuario = u.idUsuario 
          WHERE 1=1";

if ($search_nome) {
    $query .= " AND u.NomeCompleto LIKE :search_nome";
}

if ($search_id) {
    $query .= " AND l.idUsuario = :search_id";
}

$query .= " ORDER BY l.idLog DESC 
            LIMIT :inicio, :limite";

$stmt = $conn->prepare($query);

if ($search_nome) {
    $stmt->bindValue(':search_nome', '%' . $search_nome . '%', PDO::PARAM_STR);
}

if ($search_id) {
    $stmt->bindValue(':search_id', $search_id, PDO::PARAM_INT);
}

$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':limite', $limite_resultado, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contar a quantidade de registros no BD para paginação
$count_query = "SELECT COUNT(l.idLog) AS num_result 
                FROM tb_Log l 
                JOIN tb_Usuarios u ON l.idUsuario = u.idUsuario 
                WHERE 1=1";

if ($search_nome) {
    $count_query .= " AND u.NomeCompleto LIKE :search_nome";
}

if ($search_id) {
    $count_query .= " AND l.idUsuario = :search_id";
}

$count_stmt = $conn->prepare($count_query);

if ($search_nome) {
    $count_stmt->bindValue(':search_nome', '%' . $search_nome . '%', PDO::PARAM_STR);
    
}

if ($search_id) {
    $count_stmt->bindValue(':search_id', $search_id, PDO::PARAM_INT);
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
  <title>O Rafaelo - Logs</title>
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
            <a class="dropdown-item" href="tela_log.php">Log</a>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="p1">Registros de Log</h2>
        <form method="GET" action="tela_log.php">
          <div class="form-row">
            <div class="col">
              <input type="text" name="search_nome" class="form-control" placeholder="Pesquisar por Nome" value="<?php echo $search_nome; ?>">
            </div>
            <div class="col">
              <input type="text" name="search_id" class="form-control" placeholder="Pesquisar por ID" value="<?php echo $search_id; ?>">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
          </div>
        </form>
        <br>
        <table class="table table-hover table-bordered">
          <thead class="bg-success">
            <tr>
              <th>ID</th>
              <th>Data Login</th>
              <th>Tipo 2FA</th>
              <th>ID Usuário</th>
              <th>Nome Usuário</th>
              <th>Status</th>
              <th>Resposta 2FA</th>
            </tr>
          </thead>
          <tbody class="bg-light">
            <?php
            foreach ($resultado as $row) {
                echo "<tr>";
                echo "<td>" . $row['idLog'] . "</td>";
                echo "<td>" . $row['DataLogin'] . "</td>";
                echo "<td>" . $row['Tipo2FA'] . "</td>";
                echo "<td>" . $row['idUsuario'] . "</td>";
                echo "<td>" . $row['NomeUsuario'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "<td>" . $row['Resposta2FA'] . "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <?php
            $max_links = 2;
            echo "<li class='page-item'><a class='page-link' href='tela_log.php?page=1'>Primeira</a></li>";
            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
              if ($pag_ant >= 1) {
                echo "<li class='page-item'><a class='page-link' href='tela_log.php?page=$pag_ant'>$pag_ant</a></li>";
              }
            }
            echo "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";
            for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
              if ($pag_dep <= $qnt_pagina) {
                echo "<li class='page-item'><a class='page-link' href='tela_log.php?page=$pag_dep'>$pag_dep</a></li>";
              }
            }
            echo "<li class='page-item'><a class='page-link' href='tela_log.php?page=$qnt_pagina'>Última</a></li>";
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLa7f9C2hg65VtZ1pHw/o0U6ghlN1ghKaUknh" 
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
        crossorigin="anonymous"></script>
        <script src="js/dark_mode.js"></script>
</body>
</html>
