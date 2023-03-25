<?php

include "conexao.php";

// Nome do operador - Última devolução
$sql = "SELECT f.nome from funcionarios_filial f inner join devolucao_sacolas d on d.id_cracha = f.id_cracha where id_registro = (select max(id_registro) from devolucao_sacolas)";
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

// Quantidade - Última devolução
$sql = "SELECT quantidade from devolucao_sacolas where id_registro = ( select max(id_registro) from devolucao_sacolas )";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

$qtd_devolvida = $result[0]['quantidade']; 

if (strlen($primeiro_seg_nome) < 4) {
  echo "OPER. NÃO CADASTRADO<br> $qtd_devolvida sacolas";
} else {
  echo "$primeiro_seg_nome <br> $qtd_devolvida sacolas";
}

?>