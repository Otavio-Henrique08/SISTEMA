<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];

$sql = "INSERT INTO regiao(nome) VALUES ('$nome')";
//executa sql
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = " $nome Cadastrado com Sucesso!";

//mandar para pagina principal
header('Location:../../regiao.php');

?>