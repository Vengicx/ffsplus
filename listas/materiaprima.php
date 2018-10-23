<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Produtos</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Quantidade em Estoque</td>
				<td>Quantidade por Pedaço</td>
				<td>Preço por Unidade</td>
				<td>Adicionar Estoque</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/conecta.php";

	$sql = "select * from materiaprima";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$qtdPedacos = $data->qtdPedacos;
		$quantidade = $data->quantidade;
		$precoUnidade = $data->precoUnidade;

		$precoCompra = str_replace(".", ",", $precoCompra);

		echo "<tr>
				<form action=\"home.php?fd=salvar&pg=materiaprima\" method=\"post\">
				<td><input type=\"hidden\" name=\"id\" value=\"$id\">$id</td>
				<td>$nome</td>
				<td>R$ $precoCompra</td>
				<td>$quantidade</td>
				<td>$qtdPedacos</td>
				<td>$precoUnidade</td>
				<td><input type=\"number\" name=\"quantidade\" required></td>
				<td>
					<button class='btn btn-primary btnAdicionar' type='submit' href='#'><i class='fa fa-plus'></i></button>
					<a class='btn btn-success' href='home.php?fd=cadastro&pg=materiaprima&id=$id'><i class='fa fa-pencil'></i></a>
				</td>
			  </tr>
			  </form>";


	}
?>
	</table>