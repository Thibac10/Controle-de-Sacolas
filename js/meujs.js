// Funções ao carregar a página
$(document).ready(function() {
    load_index();
	focus_input('retirada');
	check_login();
});
/* ---------------------------- */

function load_index() {
	$.ajax({
		url:"estoque.php",
		method:"POST",
		success:function(data)
		{
			$('#label_qtd').html(data);
		}
	});
	
	load_ultima_retirada();
	load_ultima_devolucao();
	
}

function load_ultima_retirada(){
	$.ajax({
		url:"ultima_retirada.php",
		method:"POST",
		success:function(data)
		{
			$('#label_ultima_retirada').html(data);
		}
	});
}

function load_ultima_devolucao(){
	$.ajax({
		url:"ultima_devolucao.php",
		method:"POST",
		success:function(data)
		{
			$('#label_ultima_devolucao').html(data);
		}
	});
}

function retirada(){
	$valor = (event.keyCode);
	if ($valor == 13){
		
		$matricula_retirada = $('#input_mat_retirada').val();
		if ($matricula_retirada != '' && $matricula_retirada > 100){
			
			$.ajax({
				url:"retirada.php",
				method:"POST",
				data: {input_mat_retirada: $('#input_mat_retirada').val()},
				success:function(data){	
					load_index();
					$("#input_mat_retirada").val('');
					input_mat_retirada.focus();
				}
			});
		}
	}
}



function devolucao(id){
	$valor = (event.keyCode);
	if ($valor == 13){
		
		if (id == 'qtd'){
			input_mat_devolucao.focus();
		}
		
		if (id == 'matricula'){
			$quantidade = $('#input_qtd_devolucao').val();
			$matricula = $('#input_mat_devolucao').val();

			if ($quantidade != '' && $matricula != '' && $matricula > 100){
				$.ajax({
					url:"devolucao.php",
					method:"POST",
					data: {input_mat_devolucao: $('#input_mat_devolucao').val(), input_qtd_devolucao: $('#input_qtd_devolucao').val()},
					success:function(data)
					{
						load_index();
						$("#input_mat_devolucao").val('');
						$("#input_qtd_devolucao").val('');
						input_qtd_devolucao.focus();
					}
				});
			}
		}
	}
}


// Define foco no input
function focus_input(parametro){
	
	if (parametro == 'retirada'){
		input_mat_retirada.focus();
		$('#label_ultima_devolucao').attr('id','label_ultima_retirada');
		$('#ultimo_registro').text('Última Retirada');
		load_ultima_retirada();
	}
	
	if (parametro == 'devolucao') {
		input_qtd_devolucao.focus();
		$('#label_ultima_retirada').attr('id','label_ultima_devolucao');
		$('#ultimo_registro').text('Última Devolução');
		load_ultima_devolucao();
	}
}

