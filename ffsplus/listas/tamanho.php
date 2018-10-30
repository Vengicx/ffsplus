<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$tela = $_GET["pg"];
?>
	<h1 class="text-center">Lista de Tamanhos</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Tamanho</td>
				<td>Quantidade de Pedaços</td>
				<td>Quantidade Máxima de Sabores</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php
	$id = $qtdPedacos = $qtdSabores = $nome = "";

	include "./app/conecta.php";

	$sql = "select * from tamanho order by qtdPedacos";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$qtdPedacos = $data->qtdPedacos;
		$qtdSabores = $data->qtdSabores;
		$nome = $data->nome;

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$qtdPedacos</td>
				<td>$qtdSabores</td>
				<td>
					<a class='btn btn-success' href='home.php?fd=cadastro&pg=tamanho&id=$id'><i class='fa fa-pencil'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='fa fa-trash'></i></a>
				</td>
			  </tr>";

	}
?>
	</table>
<script>	
	function excluir(id,nome) {
		//pergunta e confirmar
		if ( confirm( "Deseja realmente excluir "+nome+" ? ") ) {
			//mandar excluir
			link = "home.php?fd=excluir&pg=excluircadastro&tela=<?=$tela?>&id="+id;
			//chamar o link
			location.href = link;
		}
	}
</script>