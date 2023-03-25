<?php

include("conexao.php");

$query = "SELECT id, nome, id_cracha FROM funcionarios_filial where id_cargo = 4 order by nome";
mysqli_query("$query");

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();

$output = '

	<thead>
	<tr>
		<th id="th_nome_lista_de_operadores">NOME</th>
		<th id="th_lista_de_operadores">MATRÍCULA</th>
		<th id="th_lista_de_operadores">EDITAR</th>
		<th id="th_lista_de_operadores">EXCLUIR</th>
	</tr>
	</thead>
	<tbody>';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row["nome"].'</td>
			<td>'.$row["id_cracha"].'</td>

			<td><button class="btn btn-sm btn-outline-secondary botao_editar" id="'.$row["id"].'">Editar</button></td>
			
			<td><button class="btn btn-sm btn-outline-secondary botao_deletar" id="'.$row["id"].'">Deletar</button></td>
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
$output .= '</tbody>';
echo $output;
?>
