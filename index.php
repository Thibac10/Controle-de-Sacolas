<?php
	session_start();
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
		<link href="css/estilo.css" rel="stylesheet" >

		<!-- Java Scripts -->
		<script src="js/bootstrap.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
		<script src="js/jquery.min_2.1.1.js"></script>
		<script src="js/jquery-ui.js" ></script>
		<script src="js/js_geral.js" ></script>
		<script src="js/meujs.js" ></script>

		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
		
	</head>
	
	<body class="background">
		<header>

			<!-- Navbar Logo  -->
			<div class="navbar_logo navbar-dark bg-dark shadow-sm">
				<div class="container d-flex justify-content-between">
					<a href="#" class="navbar-brand d-flex align-items-center">
						<img width="40" height="40" src="images/atacadao_logo.svg" alt="Atacadão">
						<strong>&nbsp;&nbsp;&nbsp; Itaquaquecetuba - Controle de Sacolas</strong>
					</a>
					
					<div class="btn-group">					
						<button id="btn_login_logout" type="button" class="btn btn-sm btn-outline-secondary" href="#">Login</button>
					</div>
				</div>
			</div>
			
			<!-- Links Navbar  -->
			<div class="links_navbar navbar-dark bg-dark_2 shadow-sm">
				<div class="container d-flex">
					<li class="navbar_li"> <a class="link_navbar_2" href="#">HOME</a></li>
					<li class="navbar_li"> <a class="link_navbar_2" href="relatorio_diario.php">Relatórios</a></li>
					<li class="navbar_li"> <a id="lista_de_operadores" class="link_navbar_2" href="lista_operadores.php">Lista de Operadores</a></li>
				</div>
			</div>
			
		</header>

		<main role="main">
			<div class="py-5 bg-light">
				<div class="container">
				
					<!-- Início Página -->
				
					<div class="tab">
						<input class="tab_item" type="radio" name="tabs" id="tab1" onclick="focus_input('retirada')" checked>
						<label for="tab1">Retirada</label>
			 
						<input class="tab_item" type="radio" name="tabs" id="tab2" onclick="focus_input('devolucao')">
						<label for="tab2">Devolução</label>
				
						<div class="tabs">
							<div class="content">
								<h2 class="titulo_aba">Retirada de Sacolas</h2>
								<hr class="linha_hr">
					  
								<div id="fundo_retirada_devolucao">
									<form id="form-retirada" action="retirada.php" method="post">
									<div class="item_matricula_ret" >
										<h4>Matrícula</h4>
										<input type="text" id="input_mat_retirada" name="input_mat_retirada" class="input_retirada_devolucao form-control" onkeypress="return somenteNumeros(event)" onKeyUp="retirada()" maxlength="15" autocomplete="off">
									</div>
						  
									<div class="item_quantidade_ret" >
										<h4>Quantidade</h4>
										<input type="text" id="input_qtd_retirada" class="input_retirada_devolucao tam_qtd_sacola form-control" onkeypress="return somenteNumeros(event)" maxlength="2" placeholder="20" disabled="true" autocomplete="off">
									</div>
								</div>
							</div >
					 
							<div class="content">
								<h2 class="titulo_aba">Devolução de Sacolas</h2>
								<hr class="linha_hr">
								
								<div id="fundo_retirada_devolucao">
								
									<div class="item_quantidade_dev" >
										<h4>Quantidade</h4>
										<input type="text" id="input_qtd_devolucao" name="input_qtd_devolucao" class="input_retirada_devolucao tam_qtd_sacola form-control" maxlength="2" onkeypress="return somenteNumeros(event)" onKeyUp="devolucao('qtd')" autocomplete="off">
									</div>
									
									<div class="item_matricula_dev" >
										<h4 id="label_matricula_ret">Matrícula</h4>
										<input type="text" id="input_mat_devolucao" name="input_mat_devolucao" class="input_retirada_devolucao form-control" onkeypress="return somenteNumeros(event)" maxlength="15" onKeyUp="devolucao('matricula')" autocomplete="off">
									</div>
									
								</div>
							</div>
						</div>
					</div>
				
					<!-- Modal Login -->	
					<div id="modal_login" class="hide">
						<div class="modal-bg"></div>
						<div class="modal-content_login animate">
							<h3 class="titulo_modal">LOGIN</h3>
							<input id="usuario_login" name="usuario_login" class="input_modal_login form-control" type="text" placeholder="Usuário" maxlength="15"> 
							<input id="senha_login" name="senha_login" class="input_modal_login form-control" type="password" placeholder="Senha" maxlength="50" onKeyUp="login_enter()"> 
							<a class="esqueci_senha" href="#">Alterar senha</a>
							<br>
							<button id="botao_entrar" type="button" class="btn btn-sm btn-outline-secondary">Entrar</button>
							<a class="modal-close" id="fechar_login" >×</a>
						</div>
					</div>
					<!-- Fim modal -->
				  
				  
					<!-- Informativo flutuante -->
					<div class="estoque">
						<h4 class="informativo_titulo">Estoque Total</h4>
						<p class="informativo_conteudo" id="label_qtd">...<p>
					</div>
				 
					<div class="ultima_retirada">
						<h4 id="ultimo_registro" class="informativo_titulo">Última Retirada</h4>
						<p class="informativo_conteudo" id="label_ultima_retirada">...<p>
					</div>
				 
					<!-- Fim Página-->
				</div>
			</div>
		</main>
	</body>
</html>
