<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];
$razao_social = $_REQUEST['razao_social'];
$tipo = $_REQUEST['tipo'];
$cnpj_cpf = $_REQUEST['cnpj_cpf'];
$endereco = $_REQUEST['endereco'];
$telefone = $_REQUEST['telefone'];
$celular = $_REQUEST['celular'];
$email = $_REQUEST['email'];
$cidade = $_REQUEST['cidade'];

$sql2 = "SELECT * FROM ponto_focal WHERE nome = '$nome' AND id_cidade_fk='$cidade' ";
$resultado = mysqli_query($conexao, $sql2);

if(mysqli_num_rows($resultado) > 0){
    session_start();
    $_SESSION['mensagem'] = "Ponto Focal já cadastrada!";
}else{
$sql = "INSERT INTO ponto_focal(nome, razao_social, tipo, cnpj_cpf, endereco, telefone, celular, email, id_cidade_fk) 
VALUES ('$nome', '$razao_social', '$tipo', '$cnpj_cpf', '$endereco', '$telefone', '$celular', '$email', '$cidade')";
//executa sql
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = " $nome Cadastrado com Sucesso!";
}
//mandar para pagina principal
header('Location:../../pontoFocal.php');
?>         