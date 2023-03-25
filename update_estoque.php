<?php

include "conexao.php";

$usuario = $_POST['user'];
$action = $_POST['action'];
$quantidade= $_POST['qtd_estoque'];
$data = strftime("%Y-%m-%d");
$hora = strftime('%H:%M:%S');

if ($action == 'botao_atualizar_estoque') {
  $sql = "INSERT INTO reg_estoque_sacolas (usuario, quantidade, data, hora) VALUES ('$usuario', '$quantidade','$data','$hora')";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $sql = "UPDATE estoque_sacolas SET quantidade = (quantidade + '$quantidade')";
  $statement = $connect->prepare($sql);
  $statement->execute();
  
  echo "Estoque Atualizado";

} elseif ($action== 'botao_zerar_estoque') {
  $sql = "UPDATE estoque_sacolas SET quantidade = 0";
  $statement = $connect->prepare($sql);
  $statement->execute();

  echo "Estoque Zerado";
}

?>