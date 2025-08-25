<?php
    include '../conexao.php';
    //receber dados do front-end
    $id  = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cep = $_REQUEST['cep'];
    $estado = $_REQUEST['estado'];
    $regiao = $_REQUEST['regiao'];
    

    $sql = "UPDATE cidade SET nome='$nome', cep='$cep', estado='$estado', id_regiao_fk='$regiao' WHERE id='$id' ";
    //executar o sql
    mysqli_query($conexao, $sql);
    //retornar para tela principal

    session_start();
    $_SESSION['mensagem'] = "$nome Alterado com Sucesso!";

    header('Location:../../cidade.php');
?>