<?php
include "conexao.php";
include "relatorio_sacolas.php";
?>

<!--------------------- HTML ------------------------>

<!DOCTYPE html>
<html lang="pt"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Controle de Sacolas - Mogi das Cruzes</title>

    <!-- Bootstrap core CSS -->
<link href="bootstrap.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/estilo.css" rel="stylesheet" >
	
	</script><script src="bootstrap.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="js/jquery.min_2.1.1.js"></script>
	<script src="js/busca.js"></script>

<script>
$(document).ready(function() {
	window.print();
});
</script>

	</style>
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  </head>
  <body class="background">
    <header>  
  
</header>

<main role="main">
  <div class="py-5 bg-light">
    <div id="fundo_relatorio_impressao" class="container sombra">
	<!-- Início Página -->
	<h2 class="titulo_pagina_impressao">Controle de sacolas</h2>
	<h4 class="subtitulo_pagina_impressao"> • Data do Relatório: 28/02/2020 </h4>
	<hr id="imprimir" class="linha_hr_relatorios">

	<div id=tamanho_relatorio>
        <table id="tabela_rel_impressao" class="table table-hover">
		
			<!--  Importação do conteudo para página -->
					<?php echo $output ?>
			<!----------------------------------------->
			
		</table>
	</div>
        <script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
        </script>
	
	<!-- Modal de cadastro  -->
<div id="modal" class="hide" style="display: none;">
    <div class="modal-bg"></div>
    <div class="modal-content animate">
        <h3 class="titulo_modal">Cadastro de Operadores</h3>
		<b class="label_descricao_input">Matrícula</b>
		<input id="cadastro_mat" name="cadastro_mat" class="input_modal" type="text" placeholder="ID Chachá" onkeypress="return somenteNumeros(event)" maxlength="15" autocomplete="off">
		<b class="label_descricao_input">Nome operador</b>
		<input id="cadastro_nome" name="cadastro_nome" class="input_modal" type="text" placeholder="Nome do Operador" maxlength="50" autocomplete="off" oninput="somenteMaiusculos(event)"> 
		<button id="botao_cadastrar" name="botao_cadastrar" type="button" class="btn btn-sm btn-outline-secondary" onclick="cadastrar()">Cadastrar</button>
		<div id="mensagem_cadastro" name="mensagem_cadastro"></div>
        <a class="modal-close" onclick="document.getElementById('modal').style.display='none'; $('#label_mensagem_cadastro').html('');">×</a>
    </div>
</div>
	<!-- Fim modal -->
	
	<!-- Modal de Editar  -->
<div id="modal_editar" class="hide" style="display: none;">
    <div class="modal-bg"></div>
    <div class="modal-content animate">
        <h3 class="titulo_modal">Editar operador:</h3>
		<b class="label_descricao_input">Matrícula</b>
		<input id="cadastro_mat" name="cadastro_mat" class="input_modal" type="text" placeholder="ID Chachá" onkeypress="return somenteNumeros(event)" maxlength="15" autocomplete="off">
		<b class="label_descricao_input">Nome operador</b>
		<input id="cadastro_nome" name="cadastro_nome" class="input_modal" type="text" placeholder="Nome do Operador" maxlength="50" autocomplete="off" oninput="somenteMaiusculos(event)"> 
		<button id="botao_cadastrar" name="botao_cadastrar" type="button" class="btn btn-sm btn-outline-secondary" onclick="cadastrar()">Cadastrar</button>
		<div id="mensagem_cadastro" name="mensagem_cadastro"></div>
        <a class="modal-close" onclick="document.getElementById('modal_editar').style.display='none'; $('#label_mensagem_cadastro').html('');">×</a>
    </div>
</div>
	<!-- Fim modal -->
	
	<!-- Modal Login -->	
	<div id="modal2" class="hide" style="display: none;">
    <div class="modal-bg"></div>
    <div class="modal-content_login animate">
	<form id="login">
        <h3 class="titulo_modal">LOGIN</h3>
		<input id="usuario_login" class="input_modal_login" type="text" placeholder="Usuário" name="matricula" maxlength="15"> 
		<input id="senha_login" class="input_modal_login" type="password" placeholder="Senha" name="senha" maxlength="50"> 
		<a class="esqueci_senha" href="#">Alterar senha</a><br>
		<button id="botao_entrar" type="button" class="btn btn-sm btn-outline-secondary" onclick="login()">Entrar</button>
        <a class="modal-close" onclick="document.getElementById('modal2').style.display='none'">×</a>
    </form>
   </div>
   </div>
	<!-- Fim modal -->  
	
<!-- Fim Página-->
    </div>
  </div>
</main>
</body></html>
