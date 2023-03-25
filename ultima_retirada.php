<?php

include "conexao.php";

// Nome do operador - Última retirada
$sql = "SELECT f.nome from funcionarios_filial f inner join retirada_sacolas r on r.id_cracha = f.id_cracha where id_registro = (select max(id_registro) from retirada_sacolas )";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

$nome_completo = $result[0]['nome'];
// Junta os dois primeiros nomes em uma nova string
$arr = explode(' ', $nome_completo);

if ($arr[1] == 'DA'|| $arr[1] == 'DAS' || $arr[1] == 'DO' || $arr[1] == 'DOS' || $arr[1] == 'DE') {
  $primeiro_seg_nome = $arr[0] . ' ' . $arr[1] . ' ' . $arr[2];
}  else {
  $primeiro_seg_nome = $arr[0] . ' ' . $arr[1];
}

// Quantidade - Última retirada
$sql = "SELECT quantidade from retirada_sacolas where id_registro = ( select max(id_registro) from retirada_sacolas )";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

$qtd_retirada = $result[0]['quantidade']; 

if (strlen($primeiro_seg_nome) < 4) {
  echo "OPER. NÃO CADASTRADO<br> $qtd_retirada sacolas";
} else {
  echo "$primeiro_seg_nome <br> $qtd_retirada sacolas";
}

?>
