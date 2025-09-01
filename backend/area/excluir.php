<?php
include '../conexao.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM area WHERE id='$id' ";
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = " $id Excluido com Sucesso!";

//mandar para pagina principal
header('Location:../../area.php');

?>