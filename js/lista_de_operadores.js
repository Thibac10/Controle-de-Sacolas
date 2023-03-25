// Função a ser executada ao carregar a página
$(document).ready(function() {
    load_data2();
	check_login();
});
// --------------------------------------------

// Funções específicas da página
function load_data2()
{
	$.ajax({
		url:"listarOperadores.php",
		method:"POST",
		success:function(data)
		{	
			$('#tabela_lista_de_operadores').html(data);
		}
	});
}

// Eventos lista_operadores.php
// Obs. Eventos que possuem comportamentos em outras páginas estão no arquivo "js_geral.js"
$(document).on('click', '.botao_editar', function(){
	var id = $(this).attr('id');
	var action = 'listarOperadores_single';
	$.ajax({
		url:"actionListarOperadores.php",
		method:"POST",
		data:{id:id, action:action},
		dataType:"json",
		success:function(data)
		{
			$('#cadastro_nome').val(data.nome);
			$('#cadastro_mat').val(data.id_cracha);
			$('#action').val('update');
			$('#hidden_id').val(id);
			$('.titulo_modal').val("Editar Operador");
			$('#botao_cadastrar').val('Atualizar');
			$("#modal").removeClass("hide");
		}
	});
});

$(function (){
	$('#modal_deletar').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"actionListarOperadores.php",
					method:"POST",
					data:{id:id, action:action},					
					success:function(data)
					{
						load_data2();
					}
				}); $(this).dialog('close');
			},
			Cancelar : function(){
					$(this).dialog('close');
				}
			}
	});
});

// Ação Botão Deletar
$(document).on('click', '.botao_deletar', function(){
	var id = $(this).attr('id');
	$('#modal_deletar').data('id', id).dialog('open');

});

$(document).on('click', '.btn_estoque', function(){
	var action = $(this).attr('id')
	var qtd_estoque = $('#input_modal_estoque').val()
	var user = $('#user').val()
	$.ajax({
		url:"update_estoque.php",
		method:"POST",
		data:{qtd_estoque:qtd_estoque, user:user, action:action},
		success:function(data)
		{	
			$("#estoque_message").html(data);
			$('#input_modal_estoque').val('');
		}
	});
});

// Função de Busca
function myFunction(){
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("input_busca");
	filter = input.value.toUpperCase();
	table = document.getElementById("tabela_lista_de_operadores");
	tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }	
}
