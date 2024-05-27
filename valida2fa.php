<?php
session_start();
ob_start();
require_once "conexao.php";
if (!isset($_SESSION['username'])) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
  header("Location: login.php");
}

// Definir valor mesmo se a sessão não existir. (parar aquele erro chato)
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;

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
    <title>Confirmação de dados</title>
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
    <section  class="container">
    <div>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;
    $momname = isset($_POST['momname']) ? $_POST['momname'] : null;
    $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
    
    $perguntas = isset($_SESSION['pergunta']) ? $_SESSION['pergunta'] : rand(1, 3); // Operador ternário

    $resposta = null;
    $tipo2fa = null;

    switch ($perguntas) {
        case 1:
            $tipo2fa = "Nome Materno";
            $resposta = $momname;  
            break;
      
        case 2:
            $tipo2fa = "Data de Nascimento";
            $resposta = $birthday;
            break;
      
        case 3:
            $tipo2fa = "CEP";
            $resposta = $cep;
            break;
    }

    if (!isset($_SESSION['tentativas'])) {
        $_SESSION['tentativas'] = 0;
    }

    if ($_SESSION['tentativas'] >= 3) {
        $_SESSION['msg'] = "<p class='msgError'>Quantidade de tentativas excedidas! Tente novamente.</p>";
        unset($_SESSION['tentativas']); // Remover a variável de tentativas
        header('Location: login.php');
        exit();
    }

    $idUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

    $stmt = $conn->prepare("SELECT * FROM tb_Usuarios WHERE idUsuario = :id_usuario AND (DataNasc = :birthday OR NomeMaterno = :momname OR CEP = :cep)");
    $stmt->bindParam(':id_usuario', $idUsuario);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':momname', $momname);
    $stmt->bindParam(':cep', $cep);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    $dataLogin = date('Y-m-d H:i:s');
 

    if ($stmt->rowCount() > 0) {
        // Se a autenticação for bem-sucedida
        echo "<div style='text-align: center; margin-top: 100px;'>";
        echo "<h1 class='msgSuccess'>Autenticação bem-sucedida! Redirecionando para a página principal...</h1>";
        echo "</div>";
        $_SESSION['username'] = $usuario['NomeCompleto'];
        $_SESSION['tipo_usuario'] = $usuario['Tipo_usuario'];
        $_SESSION['login'] = $usuario['Login'];
        $_SESSION['usuario_logado'] = true;
        $_SESSION['tentativas'] = 0;
        $_SESSION['usuario_autenticado'] = true;
        $status = "Autenticado"; 
        header("Refresh:2;URL = index.php");
          } else {
        // Se a autenticação falhar
        $_SESSION['tentativas']++;
        if ($_SESSION['tentativas'] >= 3) {
            $_SESSION['msg'] = "<p class='msgError'>Quantidade de tentativas excedidas! Tente novamente.</p>";
            unset($_SESSION['tentativas']);
            $status = "Não autenticado"; 
            header("Location: login.php");
        } else {
            echo "<h1 class='p1'>Autenticação incorreta! Tente novamente.</h1>";
            echo "<div class='text-center'>";
            echo "<a href='2fa.php' class='btn btn-info btn-lg'>Voltar</a>";
            echo "</div>";
            $status = "Não autenticado";
                // Inserção na tabela tb_Log
    $sql = "INSERT INTO tb_Log (DataLogin, Tipo2FA, idUsuario, Status, Resposta2FA) VALUES (?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bindParam(1, $dataLogin);
    $stmt2->bindParam(2, $tipo2fa);
    $stmt2->bindParam(3, $idUsuario);
    $stmt2->bindParam(4, $status);
    $stmt2->bindParam(5, $resposta);
    $stmt2->execute();

    // Redirecionamento apenas se a autenticação for ok
    if ($status === "Autenticado") {
        
    }
            exit(); 
        }
    }

    // Inserção na tabela tb_Log
    $sql = "INSERT INTO tb_Log (DataLogin, Tipo2FA, idUsuario, Status, Resposta2FA) VALUES (?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bindParam(1, $dataLogin);
    $stmt2->bindParam(2, $tipo2fa);
    $stmt2->bindParam(3, $idUsuario);
    $stmt2->bindParam(4, $status);
    $stmt2->bindParam(5, $resposta);
    $stmt2->execute();

    // Redirecionamento apenas se a autenticação for ok
    if ($status === "OK") {
        
    }
}
?>

    </div>
    </section>
    
   
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