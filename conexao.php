<?php

date_default_timezone_set('America/Sao_Paulo');

try{
	$connect = new PDO("mysql:host=localhost;dbname=atacadao", "filial347", "senhafilial");
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
