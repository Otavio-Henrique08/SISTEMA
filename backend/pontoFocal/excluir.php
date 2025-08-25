<?php
include '../conexao.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM cidade WHERE id='$id' ";
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = " $id Excluido com Sucesso!";

//mandar para pagina principal
header('Location:../../cidade.php');

?>