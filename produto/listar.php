<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["fd"];
?>
	<h1 class="text-center">Lista de Produtos</h1>
	<br>

	<a href="home.php?fd=produto&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço de Compra</td>
				<td>Preço de Venda</td>
				<td>Quantidade em Estoque</td>
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
				<td>$id</td>
				<td>$nome</td>
				<td>R$ $precoCompra</td>
				<td>R$ $precoVenda</td>
				<td>$quantidade</td>
				<td>
					<button class='btn btn-primary btnAdicionar' data-toggle='modal' data-target='#$id'><i class='far fa-plus-square'></i></button>
					<a class='btn btn-success' href='home.php?fd=produto&pg=cadastro&id=$id'><i class='far fa-edit'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
				</td>
			  </tr>

			  <div class=\"modal fade\" id=\"$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
			  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
				  <div class=\"modal-content\">
					  <div class=\"modal-header\">
						  <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Adicionar Estoque</h5>
						  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
						  <span aria-hidden=\"true\">&times;</span>
						  </button>
					  </div>
					  <div class=\"modal-body\">
					  		<form action=\"home.php?fd=produto&pg=salvar\" method=\"post\">
							  <label for='id'>ID</label>
							  <input class='form-control' type='text' value='$id' name='id' readonly> 
							  <br>
							  <label>Nome</label>
							  <input class='form-control' type='text' value='$nome' readonly>
							  <br>
							  <label for='quantidade'>Quantidade</label>
							  <input class='form-control' type='number' name='quantidade'> 
					  </div>
					  <div class=\"modal-footer\">
						  <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
						  <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
						  </form>
					  </div>
				  </div>
			  </div>
			  </div>
			  ";
			  
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