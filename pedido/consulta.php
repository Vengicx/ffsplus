<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["pg"];
?>
	<h1 class="text-center">Lista de Pedidos</h1>
	<br>

	<a href="home.php?fd=pedido&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
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

			$sql = "SELECT 
						pe.id AS id_pedido,
						us.nome AS nome_usuario,
						ta.nome AS nome_tamanho,
						pr.nome AS nome_produto,
						p_a.hora AS hora_inicio,
						an.situacao AS nome_andamento 
		
						FROM pedido pe
						INNER JOIN usuario us ON us.id = pe.usuario_id
						INNER JOIN tamanho ta ON ta.id = pe.tamanho_id
						INNER JOIN produto pr ON pr.id = pe.produto_id
						INNER JOIN pedido_andamento p_a ON p_a.idPedido = pe.id
						INNER JOIN andamento an ON an.id = p_a.idAndamento";
			$query = $pdo->prepare($sql);
			$query->execute();

			while($data = $query->fetch(PDO::FETCH_OBJ)){

				echo "<tr>
						<td>$data->id_pedido</td>
						<td>$data->nome_usuario</td>
						<td>$data->nome_produto</td>
						<td>$data->nome_tamanho</td>
						<td>NULL</td>
						<td>$data->hora_inicio</td>
						<td>$data->nome_andamento</td>
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
	
</script>