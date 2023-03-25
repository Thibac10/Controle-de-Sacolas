<?php
session_start();
 
require_once 'init.php';

require 'check.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v3.8.5">
		
		<title>Controle de Sacolas - Itaquaquecetuba</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet" >
		
		<!--  Java Scripts -->
		<script src="js/bootstrap.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
		<script src="js/jquery.min_2.1.1.js"></script>
		<script src="js/jquery-ui.js" ></script>
		<script src="js/js_geral.js" ></script>
		<script src="js/lista_de_operadores.js" ></script>
		
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	
	</head>

	<body class="background">
	
		<header>
			
			<!-- Navbar Logo -->
			<div class="navbar_logo navbar-dark bg-dark shadow-sm">
				<div class="container d-flex justify-content-between">
				
					<a href="index.php" class="navbar-brand d-flex align-items-center">
						<img width="40" height="40" src="images/atacadao_logo.svg" alt="Atacadão"></li>
						<strong>&nbsp;&nbsp;&nbsp; Itaquaquecetuba das Cruzes - Controle de Sacolas</strong>
					</a>
					
					<div class="btn-group">					
						<button id="logout" type="button" class="btn btn-sm btn-outline-secondary" href="#">Sair</button>
					</div>
					
				</div>
			</div>
		
			<!-- Links Navbar  -->
			<div class="links_navbar navbar-dark bg-dark_2 shadow-sm">
				<div class="container d-flex">
					<li class="navbar_li"> <a class="link_navbar_2" href="index.php">HOME</a></li>
					<li class="navbar_li"> <a class="link_navbar_2" href="relatorio_diario.php">Relatórios</a></li>
					<li class="navbar_li"> <a class="link_navbar_2" href="lista_operadores.php">Lista de Operadores</a></li>
					<li class="navbar_li"> <a class="link_navbar_2" id="cadastro" href="#">Cadastro de Operadores </a>
					<li class="navbar_li"> <a id="atualizar_estoque" class="link_navbar_2" href="#">Atualizar Estoque</a>
				</div>
			</div>
				
		</header>

		<main role="main">
			<div class="py-5 bg-light">
				<div id="info_login">Logado: <?php echo  $_SESSION['login']; ?></div>
				<div id="fundo_relatorio" class="container sombra">
				
					<!-- Início Página -->
						
						<h2 id="titulo_relatorio">Lista de Operadores</h2>
						<hr class="linha_hr_relatorios">
						<div class="form-group input-group" id="buscar">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<img id="imagem_busca"src="./images/lupa_icon.png">
							<input name="consulta" id="input_busca" placeholder="Pesquisar por nome..." type="text" class="form-control" autocomplete="off" onkeyup="myFunction()">
						</div>
						
						<div id="relatorio">
							<table id="tabela_lista_de_operadores" class="table table-hover">
								
							</table>
						</div>

						<!-- Modal de cadastro  -->
						<div id="modal" class="hide">
							<div class="modal-bg"></div>
							<div class="modal-content animate">
								<input type="text" id="titulo_modal" class="titulo_modal" value="Cadastro de Operadores">
								<b class="label_descricao_input">Matrícula</b>
								<input id="cadastro_mat" name="cadastro_mat" class="input_modal form-control" type="text" placeholder="ID Chachá" onkeypress="return somenteNumeros(event)" maxlength="15" autocomplete="off">
								<b class="label_descricao_input">Nome operador</b>
								<input id="cadastro_nome" name="cadastro_nome" class="input_modal form-control" type="text" placeholder="Nome do Operador" maxlength="50" autocomplete="off" oninput="somenteMaiusculos(event)"> 
								<input type="submit" id="botao_cadastrar" name="botao_cadastrar" type="button" class="btn btn-sm btn-outline-secondary" value="Cadastrar" />
								<div id="mensagem_cadastro" name="mensagem_cadastro"></div>
								<a class="modal-close" id="fechar" >×</a>
								<input type="hidden" name="action" id="action" value="insert" />
								<input type="hidden" name="hidden_id" id="hidden_id" />
							</div>
						</div>
						<!-- Fim modal -->
						
						<!-- Modal Atualizar Estoque  -->
					<div id="modal_estoque" class="hide">
						<div class="modal-bg"></div>
						<div class="modal-content_estoque animate">
							<div>
								<input type="hidden" name="user" id="user" value="<?php echo $_SESSION['login']; ?>" />
								<a id="fechar_modal_estoque"class="modal-close" >×</a>
							</div>
							<h3 class="titulo_modal">Atualizar Estoque</h3>
							<div class="input-group mb-3">
								<input id="input_modal_estoque" type="text" class="form-control" placeholder="Digite o estoque..." onkeypress="return somenteNumeros(event)" maxlength="15" autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2">
								<div class="input-group-append">
									<button  id="botao_atualizar_estoque" name="botao_atualizar_estoque" type="button" class=" btn_estoque btn btn-sm btn-outline-secondary">+</button>
								</div>
								<button id="botao_zerar_estoque" name="botao_zerar_estoque" type="button" class="btn_estoque btn btn-sm btn-outline-secondary">Zerar</button>
							</div>
							
							<div id="estoque_message"></div>
						</div>
					</div>
					<!-- Fim modal -->
						
						<!-- Modal Deletar  -->
						<div id="modal_deletar" title="Confirmação">
							<p>Deletar Operador?</p>
						</div>
						<!-- Fim modal -->
							
						<div id="action_alert" title="Sucesso">
						</div>
							
						<div id="delete_confirmation" title="Confirmação">
						</div>

						<!-- Modal Login -->	
						<div id="modal_login" class="hide">
							<div class="modal-bg"></div>
							<div class="modal-content_login animate">
								<h3 class="titulo_modal">LOGIN</h3>
								<input id="usuario_login" class="input_modal_login form-control" type="text" placeholder="Usuário" name="matricula" maxlength="15"> 
								<input id="senha_login" class="input_modal_login form-control" type="password" placeholder="Senha" name="senha" maxlength="50"> 
								<a class="esqueci_senha" href="#">Alterar senha</a>
								<br>
								<button id="botao_entrar" type="button" class="btn btn-sm btn-outline-secondary">Entrar</button>
								<a class="modal-close" id="fechar_login" >×</a>
							</div>
						</div>
						<!-- Fim modal -->
						
					<!-- Fim Página-->
				</div>
			</div>
		</main>
	</body>
</html>
