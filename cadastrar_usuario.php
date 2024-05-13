<?php
          require_once "conexao.php";
          session_start();

          //Pega o id do usuario pela URL
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        if (empty($id)) {
            //Se não tiver id, volta para o listar
            $_SESSION['msg'] = "<p class='msgError'>Usuário não encontrado!</p>";
            header("Location: listar.php");
            exit();
        }

        $query_usuario = "SELECT * FROM tb_Usuarios WHERE idUsuario = $id LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

        } else {
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
  <title>O Rafaelo - Editar</title>
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
          <li class="nav-item">
            <a href="listar.php" class="nav-link text-light">Voltar</a>
          </li>
        </ul>
      </nav>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="p1">Cadastrar usuário</h2>

      <?php
require_once "conexao.php";


// Pega o id do usuário pela URL

if (empty($id)) {
    // Se não tiver id, volta para o listar
    $_SESSION['msg'] = "<p class='msgError'>Usuário não encontrado!</p>";
    header("Location: listar.php");
    exit();
}

$query_usuario = "SELECT * FROM tb_Usuarios WHERE idUsuario = :id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
$result_usuario->execute();

if (($result_usuario) && ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: listar.php");
    exit();
}
?>

<!-- Seu HTML continua aqui -->

<?php
// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verificar se o usuário clicou no botão de cadastrar
if (!empty($dados['EditUsuario'])) {
    $empty_input = false;
    $dados = array_map('trim', $dados); // Remove espaços vazios

    if (in_array("", $dados)) {
        $empty_input = true;
        echo "<p class='msgError'>Erro: Necessário preencher todos os campos!</p>";
    }

    if (!$empty_input) {
        // Criptografar a senha
        $senha_hash = password_hash($dados['Senha'], PASSWORD_DEFAULT);

        try {
          $sql = $conn->prepare("INSERT INTO tb_Usuarios(NomeCompleto, Tipo_usuario, DataNasc, Sexo, NomeMaterno, CPF, Telefone_Celular, Telefone_Fixo, CEP, Endereco, Complemento, Bairro, Cidade, UF, Login, Senha) VALUES (:username, :tipo_usuario, :birthday, :gender, :momname, :cpf, :celnumber, :telnumber, :cep, :address, :complemento, :bairro, :cidade, :uf, :login, :senha)");

          $cadastrar_usuario = $conn->prepare($sql);
          $cadastrar_usuario->bindParam(':tipo_usuario', $dados['Tipo_usuario']);
          $cadastrar_usuario->bindParam(':nome_completo', $dados['NomeCompleto']);
          $cadastrar_usuario->bindParam(':nascimento', $dados['DataNasc']);
          $cadastrar_usuario->bindParam(':sexo', $dados['Sexo']);
          $cadastrar_usuario->bindParam(':nome_materno', $dados['NomeMaterno']);
          $cadastrar_usuario->bindParam(':cpf', $dados['CPF']);
          $cadastrar_usuario->bindParam(':tel_cel', $dados['Telefone_Celular']);
          $cadastrar_usuario->bindParam(':tel_fixo', $dados['Telefone_Fixo']);
          $cadastrar_usuario->bindParam(':cep', $dados['CEP']);
          $cadastrar_usuario->bindParam(':endereco', $dados['Endereco']);
          $cadastrar_usuario->bindParam(':complemento', $dados['Complemento']);
          $cadastrar_usuario->bindParam(':bairro', $dados['Bairro']);
          $cadastrar_usuario->bindParam(':cidade', $dados['Cidade']);
          $cadastrar_usuario->bindParam(':uf', $dados['UF']);
          $cadastrar_usuario->bindParam(':login', $dados['Login']);
          $cadastrar_usuario->bindParam(':senha', $senha_hash);
          $cadastrar_usuario->bindParam(':id', $dados['idUsuario']);

          $cadastrar_usuario->execute();

        if ($cadastrar_usuario->rowCount()) {
          $_SESSION['msg'] = "<p class='msgSuccess'>Usuário cadastrado com sucesso!</p>";
            header("Location: listar.php");
            exit();
        } else {
            $_SESSION['msg'] = "<p class='msgError'>Erro: Usuário não cadastrado!</p>";
        }
    } catch (PDOException $e) {
  echo "Erro ao executar a consulta: " . $e->getMessage();
}}}
?>

    </div>
  </div>

  <form action="" id="edit-usuario" method="POST" >
    <input type="hidden" name="idUsuario" value="<?php echo $row_usuario['idUsuario']; ?>">
    <div class="form-content">
        <label for="NomeCompleto">Nome Completo:</label>
        <input type="text" class="form-control" name="NomeCompleto" id="NomeCompleto" placeholder="Nome Completo">
    </div>
    <div class="form-content">
        <label for="Tipo_usuario">Tipo de Usuário:</label>
        <input type="text" class="form-control" name="Tipo_usuario" id="Tipo_usuario" placeholder="Tipo de usuário">
    </div>
    <div class="form-content">
        <label for="DataNasc">Data de Nascimento:</label>
        <input type="date" class="form-control" name="DataNasc" id="DataNasc" placeholder="Data de Nascimento">
    </div>
    <div class="form-content">
        <label for="Sexo">Sexo:</label>
        <input type="text" class="form-control" name="Sexo" id="Sexo" placeholder="Sexo">
    </div>
    <div class="form-content">
        <label for="NomeMaterno">Nome Materno:</label>
        <input type="text" class="form-control" name="NomeMaterno" id="NomeMaterno" placeholder="Nome Materno">
    </div>
    <div class="form-content">
        <label for="CPF">CPF:</label>
        <input type="text" class="form-control" name="CPF" id="CPF" placeholder="CPF">
    </div>
    <div class="form-content">
        <label for="Telefone_Celular">Telefone Celular:</label>
        <input type="text" class="form-control" name="Telefone_Celular" id="Telefone_Celular" placeholder="Telefone Celular">
    </div>
    <div class="form-content">
        <label for="Telefone_Fixo">Telefone Fixo:</label>
        <input type="text" class="form-control" name="Telefone_Fixo" id="Telefone_Fixo" placeholder="Telefone Fixo">
    </div>
    <div class="form-content">
        <label for="CEP">CEP:</label>
        <input type="text" class="form-control" name="CEP" id="CEP" placeholder="CEP">
    </div>
    <div class="form-content">
        <label for="Endereco">Endereço:</label>
        <input type="text" class="form-control" name="Endereco" id="Endereco" placeholder="Endereco">
    </div>
    <div class="form-content">
        <label for="Complemento">Complemento:</label>
        <input type="text" class="form-control" name="Complemento" id="Complemento" placeholder="Complemento">
    </div>
    <div class="form-content">
        <label for="Bairro">Bairro:</label>
        <input type="text" class="form-control" name="Bairro" id="Bairro" placeholder="Bairro">
    </div>
    <div class="form-content">
        <label for="Cidade">Cidade:</label>
        <input type="text" class="form-control" name="Cidade" id="Cidade" placeholder="Cidade">
    </div>
    <div class="form-content">
        <label for="UF">UF:</label>
        <input type="text" class="form-control" name="UF" id="UF" placeholder="UF">
    </div>
    <div class="form-content">
        <label for="Login">Login:</label>
        <input type="text" class="form-control" name="Login" id="Login" placeholder="Login">
    </div>
    <div class="form-content">
        <label for="Senha">Senha:</label>
        <input type="text" class="form-control" name="Senha" id="Senha" placeholder="Senha">
    </div>
    <a href="visualizar.php" class="btn btn-primary">Voltar</a>
    <input class="btn btn-primary" type="submit" value="Cadastrar" name="EditUsuario">
</form>

    </div>
  </div>
</div>

<script src="js/editar.js"></script>
</body>
</html>
