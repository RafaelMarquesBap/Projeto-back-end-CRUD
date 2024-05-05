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
          <input type="checkbox" name="checkbox" class="switch" id="darkModeToggle">
          <label for="darkModeToggle"></label>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" target="_blank" href="https://chat.whatsapp.com/GQYq1I96XdB2KIFWcR5UPe">
          <img src="imagens/whatsapp.png" alt="ícone do Whatsapp" width="40" height="40">
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" target="_blank" href="https://www.linkedin.com/in/rafael-marques-baptista/">
          <img src="imagens/linkedin.png" alt="ícone do LinkedIn" width="40" height="40">
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-light" href="index.php#contato">Contato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#endereco">Endereço</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="./login.php">Área do Cliente</a>
      </li>
      <li class="nav-item"></li>
    </ul>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light cabecalho2">
    <a class="" href="">
      <img src="imagens/logoR.png" alt="Logo da empresa O Rafaelo" width="100%" height="40">
    </a>
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

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="p1">Lista de Usuários</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Nome Materno</th>
            <th>CPF</th>
            <th>Telefone Celular</th>
            <th>Telefone Fixo</th>
            <th>CEP</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Login</th>
            <th>Senha</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once "conexao.php";
          session_start();

          // Receber o numero da pagina
          $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
          $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

          // Setar a quantidade de registros por pagina
          $limite_resultado = 10;

          // Calcular o inicio da visualização
          $inicio = ($limite_resultado * $pagina) - $limite_resultado;

          $query_usuarios = "SELECT * FROM tb_Usuarios ORDER BY idUsuario DESC LIMIT $inicio, $limite_resultado";
          $resultado = $conn->prepare($query_usuarios);
          $resultado->execute();

          if (($resultado) && ($resultado->rowCount() != 0)) {
            while ($row_usuario = $resultado->fetch(PDO::FETCH_ASSOC)) {
              extract($row_usuario);
          ?>
              <tr>
                <td><?php echo $idUsuario; ?></td>
                <td><?php echo $NomeCompleto; ?></td>
                <td><?php echo $DataNasc; ?></td>
                <td><?php echo $Sexo; ?></td>
                <td><?php echo $NomeMaterno; ?></td>
                <td><?php echo $CPF; ?></td>
                <td><?php echo $Telefone_Celular; ?></td>
                <td><?php echo $Telefone_Fixo; ?></td>
                <td><?php echo $CEP; ?></td>
                <td><?php echo $Endereco; ?></td>
                <td><?php echo $Bairro; ?></td>
                <td><?php echo $Cidade; ?></td>
                <td><?php echo $UF; ?></td>
                <td><?php echo $Login; ?></td>
                <td><?php echo $Senha; ?></td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='15'>Nenhum usuário encontrado!</td></tr>";
          }
          ?>
        </tbody>
      </table>
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

      echo "<a href='listar.php?page=1' class='paginacao-link'>Primeira</a> ";

      for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
        if ($pagina_anterior >= 1) {
          echo "<a href='listar.php?page=$pagina_anterior'class='paginacao-link'>$pagina_anterior</a> ";
        }
      }

      echo "$pagina ";

      for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
        if ($proxima_pagina <= $qnt_pagina) {
          echo "<a href='listar.php?page=$proxima_pagina' class='paginacao-link'>$proxima_pagina</a> ";
        }
      }

      echo "<a href='listar.php?page=$qnt_pagina' class='paginacao-link'>Última</a> ";
      ?>
    </div>
  </div>
</div>

</body>
</html>
