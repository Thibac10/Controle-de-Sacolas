<?php
include "conexao.php";

$id_cracha = $_POST['cadastro_mat'];
$nome = $_POST['cadastro_nome'];

if ($id_cracha == '' || $nome == ''){
	echo "<p id='label_mensagem_cadastro'>Todos os campos são obrigatorios.<p>";
}else{
	$sql = "INSERT INTO funcionarios_filial (id, matricula, id_cracha, usuario, nome, id_cargo) VALUES (NULL, NULL, '$id_cracha', NULL, '$nome', '4')";
	$statement = $connect->prepare($sql);
	$statement->execute();
	
	echo "<p id='label_mensagem_cadastro'>Cadastro Realizado.<p>";
}

?>