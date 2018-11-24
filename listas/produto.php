<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["pg"];
?>
	<h1 class="text-center">Lista de Produtos</h1>
	<br>

	<a href="home.php?fd=cadastro&pg=produto" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Novo</a>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Preço de Venda</td>
				<td>Quantidade em Estoque</td>
				<td>Adicionar Estoque</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php

	include "./app/conecta.php";

	$sql = "select * from produto where tipoProduto = 2 order by id";
	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		$precoCompra = $data->precoCompra;
		$precoVenda = $data->precoVenda;
		$quantidade = $data->quantidade;

		$precoCompra = str_replace(".", ",", $precoCompra);
		$precoVenda = str_replace(".", ",", $precoVenda);

		echo "<tr>
				<form action=\"home.php?fd=salvar&pg=produto\" method=\"post\">
				<td><input type=\"hidden\" name=\"id\" value=\"$id\">$id</td>
				<td>$nome</td>
				<td>R$ $precoCompra</td>
				<td>R$ $precoVenda</td>
				<td>$quantidade</td>
				<td><input type=\"number\" name=\"quantidade\" required></td>
				<td>
					<button class='btn btn-primary btnAdicionar' type='submit' href='#'><i class='fa fa-plus'></i></button>
					<a class='btn btn-success' href='home.php?fd=cadastro&pg=produto&id=$id'><i class='fa fa-pencil'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='fa fa-trash'></i></a>
				</td>
			  </tr>
			  </form>";
			  
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