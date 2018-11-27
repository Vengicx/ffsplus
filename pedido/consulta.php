<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["pg"];
?>
	<h1 class="text-center">Lista de Pedidos</h1>
	<br>

	<a href="home.php?fd=pedido&pg=cadastro" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
		<thead>
			<tr>
				<td>ID</td>
				<td>Cliente</td>
                <td>Produto</td>
                <td>Tamanho</td>
				<td>Valor</td>
				<td>Data</td>
				<td>Andamento</td>
			</tr>
		</thead>
		<?php

			include "./app/conecta.php";

			$sql = "SELECT pe.id AS id, u.nome AS nome_usuario, p.nome AS nome_produto, t.nome AS nome_tamanho, horaPedido, a.situacao 
                        AS situacao, pe.andamento_id AS andamento_id 
                        FROM pedido pe
                        INNER JOIN usuario u ON usuario_id = u.id
                        INNER JOIN produto p ON produto_id = p.id
                        INNER JOIN tamanho t ON tamanho_id = t.id
                        INNER JOIN andamento a ON andamento_id = a.id";
			$query = $pdo->prepare($sql);
			$query->execute();

			while($data = $query->fetch(PDO::FETCH_OBJ)){
				$id = $data->id;
                $nome = $data->nome_usuario;
                //$valor = $data->valor;
                $horaPedido = $data->horaPedido;
                $produto = $data->nome_produto;
                $tamanho = $data->nome_tamanho;
                $situacao = $data->situacao;


				echo "<tr>
						<td>$id</td>
						<td>$nome</td>
						<td>$produto</td>
						<td>$tamanho</td>
						<td>NULL</td>
						<td>$horaPedido</td>
						<td>$situacao</td>
					</tr>";
			}
		?>
	</table>
<script>	
	$(document).ready(function(){
		 $('#tabela').dataTable( {
            "language": {
                "url": "js/Portuguese-Brasil.json"
            }
        } );

	});
	
</script>