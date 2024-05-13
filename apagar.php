<?php
session_start();
require_once 'conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($id)) {
    //Entrou sem id, volta para o listar
    $_SESSION['msg'] = "<p class='msgError'>Usuário não encontrado!</p>";
    header("Location: listar.php");
    exit();
}

$query_usuario = "SELECT idUsuario, tipo_usuario FROM tb_Usuarios WHERE idUsuario = $id LIMIT 1";
$resultado = $conn->prepare($query_usuario);
$resultado->execute();

if($resultado->rowCount() > 0) {
    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se o tipo de usuário é diferente de "M"
    if($usuario['tipo_usuario'] != 'M') {
        $query_usuario_deletar = "DELETE FROM tb_Usuarios WHERE idUsuario = $id";
        $apagar_usuario = $conn->prepare($query_usuario_deletar);

        if($apagar_usuario->execute()) {
            $_SESSION['msg'] = "<p class='msgSuccess'>Usuário apagado com sucesso!</p>";
            header("Location: listar.php");
        } else {
            $_SESSION['msg'] = "<p class='msgError'>Erro ao apagar usuário!</p>";
            header("Location: listar.php");
        }
    } else {
        $_SESSION['msg'] = "<p class='msgError'>Não é possível apagar um usuário do tipo 'Master'!</p>";
        header("Location: listar.php");

    }
} else {
    $_SESSION['msg'] = "<p class='msgError'>Usuário não encontrado!</p>";
    header("Location: listar.php");
}

header("Location: listar.php");
exit();
?>