<?php
          session_start();
if (isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
}

          require_once "conexao.php";
          

          //Pega o id do usuario pela URL
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        if (empty($id)) {
            //Se não tiver id, volta para o listar
            $_SESSION['msg'] = "<p class='msgError'>Usuário não encontrado!</p>";
            header("Location: listar.php");
            exit();
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
  <title>O Rafaelo - Visualizar</title>
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
            <a class="nav-link active text-light" href="#contato">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#endereco">Endereço</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./login.php"
              >Área do Cliente</a
            >
            <?php if(isset($_SESSION['usuario_logado'])): ?>
              <li class="nav-item">
            <a class="nav-link text-light" href="#"><?php echo $_SESSION['login'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href=""><?php echo $_SESSION['tipo_usuario'];?></a>
          </li>
              <li class="nav-item">
              <form action="logout.php" method="POST">
              <button type="submit" name="logout" class="log_off">Encerrar sessão</button></li>
              </form>
          </li>
          <?php endif; ?>
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
          <a class="dropdown-item" href="listar.php">Visualizar Usuários
          </a>
          <a class="dropdown-item" href="area_cliente.php">Cadastrar Usuários
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="mer.php">MER</a>
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
      <h2 class="p1">Visualizar usuários</h2>
    </div>
  </div>
</div>
    <div class="table-responsive">
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
  //Faz o select do usuario com o mesmo id do visualizar
    $query_usuario = "SELECT * FROM tb_Usuarios WHERE idUsuario = $id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    // Faz um fetch dos registros encontrados na tabela.
    if(($result_usuario) AND ($result_usuario->rowCount() != 0)) {
      $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
      // Para otimizar ao mostrar os dados na tela
      extract($row_usuario);

    } else {
      //Se não tiver id, volta para o listar
      header("Location: listar.php");
      exit();
    }
    
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
          
        </tbody>
      </table>
      </div>
      <div class="text-center">
      <a href="listar.php" class="btn btn-info">Voltar</a>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>
