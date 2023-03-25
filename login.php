<?php
 
// inclui o arquivo de inicialização
require 'init.php';
 
// resgata variáveis do formulário
$user = isset($_POST['usuario_login']) ? $_POST['usuario_login'] : '';
$password = isset($_POST['senha_login']) ? $_POST['senha_login'] : '';
 
if (empty($user) || empty($password))
{
    echo "Informe user e senha";
    exit;
}
 
// cria o hash da senha
$passwordHash = md5($password);

$PDO = db_connect();
 
$sql = "SELECT * FROM usuarios WHERE user = :user AND senha = :passwordHash";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':user', $user);
$stmt->bindParam(':passwordHash', $passwordHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Usuário ou senha incorretos";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['login'] = $user['user'];
 
header('Location: index.php');
?>