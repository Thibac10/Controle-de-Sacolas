<?php

include "conexao.php";

$matricula = $_POST['input_mat_retirada'];
$data = strftime("%Y-%m-%d");
$hora = strftime('%H:%M:%S');

$sql = "INSERT INTO retirada_sacolas (id_registro, id_cracha, quantidade, data, hora) VALUES (NULL, '$matricula', 20, '$data', '$hora')";
$statement = $connect->prepare($sql);
$statement->execute();

$sql = "UPDATE estoque_sacolas SET quantidade = (quantidade - 20)";
$statement = $connect->prepare($sql);
$statement->execute();

?>