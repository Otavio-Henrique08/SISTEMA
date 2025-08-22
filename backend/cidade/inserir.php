<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];
$cep = $_REQUEST['cep'];
$estado = $_REQUEST['estado'];
$regiao = $_REQUEST['regiao'];

$sql2 = "SELECT * FROM cidade WHERE nome = '$nome'";
$resultado = mysqli_query($conexao, $sql2);

if(mysqli_num_rows($resultado) > 0){
    session_start();
    $_SESSION['mensagem'] = "Cidade já cadastrada!";
}else{
$sql = "INSERT INTO cidade(nome, cep, estado, id_regiao_fk) VALUES ('$nome', '$cep', '$estado', '$regiao')";
//executa sql
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = " $nome Cadastrado com Sucesso!";
}
//mandar para pagina principal
header('Location:../../cidade.php');
?>         