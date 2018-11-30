<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["fd"];
?>
	<h1 class="text-center">Lista de Tamanhos</h1>
	<br>

	<a href="home.php?fd=tamanho&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
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

	$sql = "SELECT * FROM tamanho ORDER BY qtdPedacos";
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
					<a class='btn btn-success' href='home.php?fd=tamanho&pg=cadastro&id=$id'><i class='far fa-edit'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
				</td>
			  </tr>";

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