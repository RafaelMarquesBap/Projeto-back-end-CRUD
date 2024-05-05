<?php

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

    require 'conexao.php';

    $login = addslashes($_POST['login']);
    $password = addslashes($_POST['password']);

} else{
    header("Location: login.php");
}





?>