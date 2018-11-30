<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["fd"];
?>
	<h1 class="text-center">Lista de Matéria-Prima</h1>
	<br>

	<a href="home.php?fd=materiaprima&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
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

			$sql = "SELECT * FROM materiaprima";
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
				$precoUnidade = str_replace(".", ",", $precoUnidade);

				echo "<tr>
						<form action=\"home.php?fd=salvar&pg=materiaprima\" method=\"post\">
						<td><input type=\"hidden\" name=\"id\" value=\"$id\">$id</td>
						<td>$nome</td>
						<td>R$ $precoCompra</td>
						<td>$quantidade</td>
						<td>$qtdPedacos</td>
						<td>R$ $precoUnidade</td>
						<td><input type=\"number\" name=\"quantidade\" required></td>
						<td>
							<button class='btn btn-primary btnAdicionar' type='submit' href='#'><i class='far fa-plus-square'></i></button>
							<a class='btn btn-success' href='home.php?fd=materiaprima&pg=cadastro&id=$id'><i class='far fa-edit'></i></a>
							<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
						</td>
					</tr>
					</form>";
			}
		?>
	</table>
<script>	
	$(document).ready(function(){
		 $('#tabela').dataTable( {
            "language": {
                "url": "plugins/js/Portuguese-Brasil.json"
            }
        } );

	});
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