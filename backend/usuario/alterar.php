<?php
    include '../conexao.php';
    //receber dados do front-end
    $id  = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "UPDATE usuario SET nome='$nome', email='$email', cpf='$cpf', senha='$senha', WHERE id='$id' ";
    //executar o sql
    mysqli_query($conexao, $sql);
    //retornar para tela principal
    header('Location:../../principal.php');

?>