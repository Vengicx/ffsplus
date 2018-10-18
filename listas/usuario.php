<link rel="stylesheet" type="text/css" href="dist/dataTables.css">
<link rel="stylesheet" type="text/javascript" href="dist/dataTables.js">
<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}
?>
	<h1 class="text-center">Lista de Usuários</h1>
	<br>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Status</td>
				<td>Tipo do Usuário</td>
				<td>Opções</td>
			</tr>
		</thead>
<?php
	include "./app/conecta.php";
	$sql = "select * from usuario where not tipoUsuario = 3";
	$query = $pdo->prepare($sql);
	$query->execute();
	while($data = $query->fetch(PDO::FETCH_OBJ)){
		$id = $data->id;
		$nome = $data->nome;
		
		if($data->status == 1){
			$status = "Ativo";
		}else{
			$status = "Inativo";
		}

		$tipoUsuario = $data->tipoUsuario;
		
		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$status</td>
				<td id='tipoUsuario'>$tipoUsuario</td>
				<td><a class='btn btn-success' href='home.php?fd=cadastro&pg=usuario&id=$id'><i class='fa fa-pencil'></i></a>
					<a href=\"javascript:excluir($id,'$nome')\" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
			  </tr>";
	}
?>
	</table>
<script>	
	function excluir(id,nome) {
		//pergunta e confirmar
		if ( confirm( "Deseja realmente excluir "+nome+" ? ") ) {
			//mandar excluir
			link = "home.php?fd=excluir&pg=usuario&id="+id;
			//chamar o link
			location.href = link;
		}
	}
</script>