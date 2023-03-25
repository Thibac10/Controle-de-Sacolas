<?php

//action.php

include('conexao.php');

$id_cracha = $_POST['cadastro_mat'];
$nome = $_POST['cadastro_nome'];


if ($_POST["action"] == "insert"){
	$sql = "INSERT INTO funcionarios_filial (id, matricula, id_cracha, usuario, nome, id_cargo) VALUES (NULL, NULL, '$id_cracha', NULL, '$nome', '4')";
	$statement = $connect->prepare($sql);
	$statement->execute();
	
	echo "<p id='label_mensagem_cadastro'>Cadastro Realizado.<p>";

}elseif($_POST["action"] == "listarOperadores_single")
	{
		$query = "SELECT * FROM funcionarios_filial WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{			
			$output['id_cracha'] = $row['id_cracha'];
			$output['nome'] = $row['nome'];
		}
		echo json_encode($output);
	
	}elseif($_POST["action"] == "update"){
		
	$sql = "UPDATE funcionarios_filial SET id_cracha = '$id_cracha', nome = '$nome' where id = '".$_POST['id']."'";
	$statement = $connect->prepare($sql);
	$statement->execute();
	
	echo "<p id='label_mensagem_cadastro'>Cadastro Atualizado.<p>";
	
	}elseif($_POST["action"] == "delete")
	{
		$query = "DELETE FROM funcionarios_filial WHERE id = '".$_POST['id']."'";
		$statement = $connect->prepare($query);
		$statement->execute();
	}
	
?>
