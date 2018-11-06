<link rel="stylesheet" type="text/css" href="dist/dataTables.css">
<link rel="stylesheet" type="text/javascript" href="dist/dataTables.js">
<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

?>
	<h1 class="text-center">Lista de Clientes</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>E-Mail</td>
				<td>CPF</td>
				<td>RG</td>
				<td>Estado</td>
				<td>Cidade</td>
				<td>Ações</td>
			</tr>
		</thead>
<?php
	include "./app/conecta.php";
	$sql = "SELECT u.id, u.nome as usuario_nome, u.cpf, u.email, u.rg, c.nome as cidade_nome, e.nome as estado_nome FROM usuario u INNER JOIN cidade c ON u.cidade = c.id INNER JOIN estado e ON c.id = e.id";


	$query = $pdo->prepare($sql);
	$query->execute();

	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->usuario_nome;
		$cpf = $data->cpf;
		$rg = $data->rg;
		$email = $data->email;
		$cidade = $data->cidade_nome;
		$estado = $data->estado_nome;
		
		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$email</td>
				<td data-mask='999.999.999-99'>$cpf</td>
				<td>$rg</td>
				<td>$estado</td>
				<td>$cidade</td>
				<td><a class='btn btn-success' href='home.php?fd=cadastro&pg=cliente&id=$id'><i class='fa fa-pencil'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='fa fa-trash'></i></a>
				</td>
			  </tr>";
	}
?>
	</table>
<script>	
	function excluir(id,nome) {
		//pergunta e confirmar
		if (confirm("Deseja realmente excluir "+nome+" ? ")){
			//mandar excluir
			link = "home.php?fd=excluir&pg=excluircadastro&tela=usuario&id="+id;
			//chamar o link
			location.href = link;
		}
	}
</script>