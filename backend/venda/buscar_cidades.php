<?php 
include '../conexao.php';

//recebendo o id de região
$regiao_id = $_POST['regiao_id'];

$cidades = mysqli_query($conexao, "SELECT * FROM cidade WHERE id_regiao_fk='$regiao_id' ORDER BY nome");

echo '<option> Selecione </option>';
while($cid = mysqli_fetch_assoc($cidades)){
    echo "<option value='{$cid['id']}'> {$cid['nome']} </option>";
}


?>