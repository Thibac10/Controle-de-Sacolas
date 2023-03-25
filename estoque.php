<?php

include "conexao.php";

$sql = "SELECT quantidade FROM estoque_sacolas";
$statement = $connect->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();

$estoque = $result[0]['quantidade'];

if ((int)$estoque  < 0) echo "Estoque negativo.";
if ((int)$estoque == 0) echo "Estoque zerado.";
if ((int)$estoque == 1) echo "1 sacola";
if ((int)$estoque  > 1) echo "$estoque sacolas";

?>