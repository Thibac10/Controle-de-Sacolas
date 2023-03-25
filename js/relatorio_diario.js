// Função a ser executada ao carregar a página
$(document).ready(function() {
	check_login();
	carregar_data();
    load_relatorio();
});
// --------------------------------------------

// Funções específicas da página
function load_relatorio()
{
	$.ajax({
		url:"relatorio_sacolas.php",
		method:"POST",
		data:{data_relatorio:$('#input_calendario').val()},
		success:function(data)
		{	
			$('#relatorio').html(data);
		}
	});
}

function carregar_data()
{
	$.ajax({
		url:"load_data.php",
		method:"POST",
		success:function(data)
		{	
			$('#input_calendario').val(data);
		}
	});
}


function myFunction(){
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("input_busca");
	filter = input.value.toUpperCase();
	table = document.getElementById("tabela_relatorio_diario");
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

function imprimir(){
	window.print();
}
// Eventos relatorios.php
// Obs. Eventos que possuem comportamentos em outras páginas estão no arquivo "js_geral.js"
