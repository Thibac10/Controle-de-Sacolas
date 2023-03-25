<?php

include("conexao.php");

$data_relatorio = $_POST['data_relatorio'];

if ($data_relatorio == '') {
	$data_relatorio = $data = strftime("%d-%m-%Y");
}

$query_retirada = "SELECT f.id_cracha, nome, SUM(r.quantidade) as quantidade_retirada FROM retirada_sacolas r left join funcionarios_filial f on f.id_cracha = r.id_cracha where id_cargo = 4 AND data = date_format(str_to_date('$data_relatorio', '%d-%m-%Y'), '%Y-%m-%d') GROUP BY f.id_cracha ORDER BY nome";
mysqli_query("$query_retirada");

$statement = $connect->prepare($query_retirada);
$statement->execute();
$result_retirada = $statement->fetchAll();
$total_row_retirada = $statement->rowCount();

$query_devolucao = "SELECT f.id_cracha, SUM(d.quantidade) as quantidade_devolvida FROM devolucao_sacolas d left join funcionarios_filial f on f.id_cracha = d.id_cracha where id_cargo = 4 AND data = date_format(str_to_date('$data_relatorio', '%d-%m-%Y'), '%Y-%m-%d') GROUP BY f.id_cracha";
mysqli_query("$query_devolucao");

$statement = $connect->prepare($query_devolucao);
$statement->execute();
$result_devolucao = $statement->fetchAll();
$total_row_devolucao = $statement->rowCount();

$output = '

	<table id="tabela_relatorio_diario" class="table table-hover">
	<thead>
	<tr>
		<th id="th_relatorio_diario_nome">NOME</th>
		<th id="th_relatorio_diario">MATRÍCULA<br></th>
		<th id="th_relatorio_diario">QTD. RETIRADA</th>
		<th id="th_relatorio_diario">QTD. DEVOLVIDA</th>
		<th id="th_relatorio_diario">VENDIDAS</th>
	</tr>
	</thead>
	<tbody>
	
	';
if($total_row_retirada > 0)
{
	$total_sacolas = 0;
	foreach($result_retirada as $row_retirada){
		
		$qtd_dev = 0;
		$qtd_vendidas = 0;
		foreach ($result_devolucao as $row_devolucao){
			if ($row_retirada["id_cracha"] == $row_devolucao["id_cracha"]){
				$qtd_dev = $row_devolucao["quantidade_devolvida"];
				$qtd_vendidas = $row_retirada["quantidade_retirada"] - $row_devolucao["quantidade_devolvida"];
				$total_sacolas += $qtd_vendidas;
				break;
			}else { $qtd_dev = "-"; $qtd_vendidas = "-";}
		}
		
		$output .= '
		<tr>
			<td>'.$row_retirada["nome"].'</td>
			<td>'.$row_retirada["id_cracha"].'</td>
			<td class="align-content-center">'.$row_retirada["quantidade_retirada"].'</td>
			<td class="align-content-center">'.$qtd_dev.'</td>
			<td>'.$qtd_vendidas.'</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="11" align="center">Dados não encontrados</td>
	</tr>
	';
}
$output .= '	</tbody>
			</table>
			<div id="total_sacolas_vendidas"><p>Total de sacolas vendidas: '.$total_sacolas.'</p></div>';

echo $output;
?>
