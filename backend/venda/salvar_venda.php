<?php
include '../conexao.php';

//receber dados do front-end
$regiao_id = $_REQUEST['regiao_id'];
$cidade_id = $_REQUEST['cidade_id'];
$ponto_focal_id = $_REQUEST['ponto_foal_id'];
$area_id = $_REQUEST['area_id'];
$dtcompra = $_REQUEST['dtcompra'];
$origem = $_REQUEST['origem'];
$obs = $_REQUEST['obs'];

$sql = "INSERT INTO area(nome, numero) VALUES ('$nome', '$numero')";

//executa sql
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = "$nome Cadastrado com Sucesso!";

//mandar para pagina principal
header('Location:../../area.php');
?>         