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
		<link href="css/jquery-ui.css" rel="stylesheet" >
		<link href="css/estilo.css" rel="stylesheet" >
		
		<!--  Java Scripts -->
		<script src="js/bootstrap.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
		<script src="js/jquery.min_2.1.1.js"></script>
		<script src="js/jquery-ui.js" ></script>
		<script src="js/js_geral.js" ></script>
		<script src="js/lista_de_operadores.js" ></script>
		
		<script>
		
			$(document).on('click', '.botao_editar', function(){
				$("#modal_login").removeClass("hide");
			});
			
			$(document).on('click', '.botao_deletar', function(){
				$("#modal_login").removeClass("hide");
			});
		</script>
		
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	
	</head>

	<body class="background">
	
		<header>
			
			<!-- Navbar Logo -->
			<div class="navbar_logo navbar-dark bg-dark shadow-sm">
				<div class="container d-flex justify-content-between">
				
					<a href="index.php" class="navbar-brand d-flex align-items-center">
						<img width="40" height="40" src="images/atacadao_logo.svg" alt="Atacadão"></li>
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
					<li class="navbar_li"> <a class="link_navbar_2" href="index.php">HOME</a></li>
					<li class="navbar_li"> <a class="link_navbar_2" href="relatorio_diario.php">Relatórios</a></li>
					<li class="navbar_li"> <a id="lista_de_operadores" class="link_navbar_2" href="#">Lista de Operadores</a></li>
				</div>
			</div>
				
		</header>

		<main role="main">
			<div class="py-5 bg-light">
				<div id="fundo_relatorio" class="container sombra">
				
					<!-- Início Página -->
						<h2 id="titulo_relatorio">Lista de Operadores</h2>
						<hr class="linha_hr_relatorios">
						<div class="form-group input-group" id="buscar">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<img id="imagem_busca"src="./images/lupa_icon.png">
							<input name="consulta" id="input_busca" placeholder="Pesquisar..." type="text" class="form-control" autocomplete="off" onkeyup="myFunction()">
						</div>
							
						<div id="relatorio">
							<table id="tabela_lista_de_operadores" class="table table-hover">						
							</table>
						</div>
							
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
								<input id="senha_login" class="input_modal_login form-control" type="password" placeholder="Senha" name="senha" maxlength="50" onKeyUp="login_enter()"> 
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
