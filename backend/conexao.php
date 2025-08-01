<?php

$endereco = "localhost";
$nome = "bancorics";
$usuario = "root";
$senha = "";

$conexao=mysqli_connect($endereco, $usuario, $senha, $nome);

//se tiver erro de conexao 
if(!$conexao){
    die("Erro na conexão com o banco!".mysqli_connect_error());
}

?> 