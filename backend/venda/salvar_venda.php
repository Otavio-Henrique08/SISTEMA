<?php
include '../conexao.php';

//receber dados do front-end
$regiao_id = $_REQUEST['regiao_id'];
$cidade_id = $_REQUEST['cidade_id'];
$ponto_focal_id = $_REQUEST['ponto_focal_id'];
$area_id = $_REQUEST['area_id'];
$dtcompra = $_REQUEST['dtcompra'];
$origem = $_REQUEST['origem'];
$obs = $_REQUEST['obs'];

$sql = "INSERT INTO venda(data, origem, obs, id_ponto_focal_fk, id_area_fk) VALUES ('$dtcompra', '$origem', '$obs', '$ponto_focal_id', '$area_id')";

//executa sql
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = "$id Cadastrado com Sucesso!";

//mandar para pagina principal
header('Location:../../area.php');
?>         