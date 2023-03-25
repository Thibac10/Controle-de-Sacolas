<?php

include "conexao.php";

$matricula = $_POST['input_mat_devolucao'];
$quantidade = $_POST['input_qtd_devolucao'];

$data = strftime("%Y-%m-%d");
$hora = strftime('%H:%M:%S');

$sql = "INSERT INTO devolucao_sacolas (id_registro, id_cracha, quantidade, data, hora) VALUES (NULL, '$matricula', '$quantidade', '$data', '$hora')";
$statement = $connect->prepare($sql);
$statement->execute();

$sql = "UPDATE estoque_sacolas SET quantidade = (quantidade + '$quantidade')";
$statement = $connect->prepare($sql);
$statement->execute();

?>