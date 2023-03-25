// ---- Funções de uso geral das páginas -----

function somenteNumeros(e) {
  var charCode = e.charCode ? e.charCode : e.keyCode;
  // charCode 8 = backspace   
  // charCode 9 = tab
  if (charCode != 8 && charCode != 9) {
    // charCode 48 equivale a 0   
    // charCode 57 equivale a 9

    if (charCode < 48 || charCode > 57) {
	    return false;
    }
  }
}

function somenteMaiusculos(e) {
   var ss = e.target.selectionStart;
   var se = e.target.selectionEnd;
   e.target.value = e.target.value.toUpperCase();
   e.target.selectionStart = ss;
   e.target.selectionEnd = se;
}

// Calendário
$( function() {
	$(document).ready(function() {
		$('#input_calendario').datepicker({
			showOn: "button",
			buttonImage: "../imagens/calendario.png",
			dateFormat: 'dd-mm-yy',
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
			buttonImageOnly: true
		});
	});
});

// Mantém apenas primeiro e segundo nome
function nome_sobrenome(str) {
  return str.split(' ').slice(0, 2).join(' ');
}

/*   --------------------------------------  */


// --- Eventos Gerais das páginas ---

/* Eventos - Login */
$(document).on('click', '#btn_login_logout', function(){
	$("#modal_login").removeClass("hide");
  document.getElementById("usuario_login").focus();
});

$(document).on('click', '#fechar_login', function(){
	$("#modal_login").addClass("hide");
});

$(document).on('click', '#botao_entrar', function(){
	login();
});

// Evento Logout
$(document).on('click', '#logout', function(){
	$.ajax({
		url:"logout.php",
		method:"POST",
		success:function(data)
		{				
			window.location.href = "index.php";
		}
	});
});

/* Eventos - Atualizar Estoque */
$(document).on('click', '#atualizar_estoque', function(){
		$("#modal_estoque").removeClass("hide");
		$('#estoque_message').html('');
	});

$(document).on('click', '#fechar_modal_estoque', function(){
		$("#modal_estoque").addClass("hide");
	});

/* Eventos - Cadastro */
$(document).on('click', '#cadastro', function(){
	$("#modal").removeClass("hide");
	$('#titulo_modal').val("Cadastrar Operadores");
	$('#botao_cadastrar').val('Cadastrar');
	$('#cadastro_mat').val('');
	$('#cadastro_nome').val('');
	$('#action').val('insert');
});

$(document).on('click', '#botao_cadastrar', function(){
	cadastrar();
});

$(document).on('click', '#fechar', function(){
	$("#modal").addClass("hide");
	$('#label_mensagem_cadastro').html('');
});

$(document).on('click', '#fechar_login', function(){
	$("#modal_login").addClass("hide");
});

function cadastrar(){
	$.ajax({
		url:"actionListarOperadores.php",
		method:"POST",
		data: {cadastro_mat: $('#cadastro_mat').val(),cadastro_nome: $('#cadastro_nome').val(), action: $('#action').val(), id: $('#hidden_id').val()},
		success:function(data)
		{	
			$('#mensagem_cadastro').html(data);
			load_data2();
		}
	});
}

// Impressão
function imprimir(){
	var imprimir = document.querySelector("#fundo_relatorio_impressao");
	imprimir.onclick = function() {
	imprimir.style.display = 'none';
	window.print();

	var time = window.setTimeout(function() {
		imprimir.style.display = 'block';
	}, 1000);
	}
}

function printBy(selector){
    var $print = $(selector)
        .clone()
        .addClass('print')
        .prependTo('body');

    // Stop JS execution
    window.print();

    // Remove div once printed
    $print.remove();
}

// Verificar se está logado
function check_login(){
	$.ajax({
		url:"check_login.php",
		method:"POST",
		success:function(data)
		{
			if (!data == '') {
				$('#lista_de_operadores').attr('href', 'admin.php');
				$('#btn_login_logout').text('Sair');
				$('#btn_login_logout').attr('id','logout');
			}
		}
	});
}

function login(){
	// Verificar se os dois inputs não estão vazios
	if ( $("#usuario_login").val() == '' || $("#senha_login").val() == '' ){
		alert('Elemento vazio!');
	} else {
		$.ajax({
		url:"login.php",
		method:"POST",
		data: {usuario_login: $('#usuario_login').val(),senha_login: $('#senha_login').val()},
		success:function(data)
		{	
     	$("#modal_login").addClass("hide"); // Fecha Modal Login
			window.location.href = "admin.php";
		}
	});
	}

}

function login_enter(){
	$valor = (event.keyCode);
	if ($valor == 13){
		login();
	}
}
