<?php
session_start();
ob_start();
require_once "conexao.php";
if (!isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
  header("Location: login.php");
}

if (isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
}

if($_SESSION['tipo_usuario'] !== "M"){
  header("Location: index.php");
}

// Verifica se o usuário está autenticado e passou pelo 2FA
if (!isset($_SESSION['usuario_logado']) OR $_SESSION['usuario_logado'] !== true OR !isset($_SESSION['usuario_autenticado']) OR $_SESSION['usuario_autenticado'] !== true) {
  session_unset();
  header('Location: login.php');
}

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
  <title>O Rafaelo - Tela Log</title>
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
      <h2 class="p1">Tela de Log</h2>
      <div>
      <?php 
      if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      
      ?>
      </div>

      <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="bg-success">
          <tr>
            <th>ID do Log</th>
            <th>Data de Login</th>
            <th>Tipo de 2FA</th>
            <th>Id do Usuário</th>
            <th>Nome do Usuário</th>
            <th>Status</th>
            <th>Resposta do 2FA</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          <?php


          // Receber o numero da pagina
          $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
          $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

          // Setar a quantidade de registros por pagina
          $limite_resultado = 10;

          // Calcular o inicio da visualização
          $inicio = ($limite_resultado * $pagina) - $limite_resultado;

          $query_usuarios = "SELECT l.idLog, l.DataLogin, l.Tipo2FA, l.idUsuario, u.NomeCompleto AS NomeUsuario, l.Status, l.Resposta2FA 
          FROM tb_Log l 
          INNER JOIN tb_Usuarios u ON l.idUsuario = u.idUsuario 
          ORDER BY l.idUsuario DESC LIMIT $inicio, $limite_resultado";
          $resultado = $conn->prepare($query_usuarios);
          $resultado->execute();


          
          if (($resultado) && ($resultado->rowCount() != 0)) {
            while ($row_usuario = $resultado->fetch(PDO::FETCH_ASSOC)) {
              extract($row_usuario);
          ?>
              <tr>
                <td><?php echo $idLog; ?></td>
                <td><?php echo $DataLogin; ?></td>
                <td><?php echo $Tipo2FA; ?></td>
                <td><?php echo $idUsuario; ?></td>
                <td><?php echo $NomeUsuario; ?></td>
                <td><?php echo $Status; ?></td>
                <td><?php echo $Resposta2FA; ?></td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='15'>Nenhum usuário encontrado!</td></tr>";
          }
          ?>
        </tbody>
      </table>
      </div>
      <?php
      // Contar a quantidade de registros no BD
      $query_qnt_registros = "SELECT COUNT(idUsuario) AS num_result FROM tb_Usuarios";
      $result_qnt_registros = $conn->prepare($query_qnt_registros);
      $result_qnt_registros->execute();
      $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

      // Quantidade de pagina
      $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);

      // Maximo de link
      $maximo_link = 2;

      echo "<a href='tela_log.php?page=1' class='paginacao-link'>Primeira</a> ";

      for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
        if ($pagina_anterior >= 1) {
          echo "<a href='tela_log.php?page=$pagina_anterior'class='paginacao-link'>$pagina_anterior</a> ";
        }
      }

      echo "$pagina ";

      for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
        if ($proxima_pagina <= $qnt_pagina) {
          echo "<a href='tela_log.php?page=$proxima_pagina' class='paginacao-link'>$proxima_pagina</a> ";
        }
      }

      echo "<a href='tela_log.php?page=$qnt_pagina' class='paginacao-link'>Última</a> ";
      ?>
    </div>
  </div>
</div>

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
</body>
</html>
