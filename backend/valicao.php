<?php 
    session_start();

    // se não tiver logado manda para o login
    // se não existir variável de sessão cpf ou senha

    if(!isset($_SESSION['cpf']) or !isset($_SESSION['senha'])){
        //destruir sessão
        session_destroy();
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);

        //manda para o login
        header('location:./index.php');
    }
?>