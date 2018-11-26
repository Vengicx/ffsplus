<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

?>

	<h1 class="text-center">Lista de Clientes</h1>
	<br>
	<a href="home.php?fd=cadastro&pg=cliente" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
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
	$sql = "SELECT u.id, u.nome as usuario_nome, u.email, u.cpf, u.rg, c.nome as cidade_nome, e.nome as estado_nome FROM usuario u 
			INNER JOIN cidade c ON u.cidade = c.id 
			INNER JOIN estado e ON u.estado = e.id WHERE tipoUsuario = 3";

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

		$arrayCpf = str_split($cpf, 3);//separa o array em 3 
		$cpf2 = $arrayCpf[0].".".$arrayCpf[1].".".$arrayCpf[2]."-".$arrayCpf[3];//junta o array com os pontos e traços :D

		$arrayRg = str_split($rg, 1);
		$rg2 = $arrayRg[0].$arrayRg[1].".".$arrayRg[2].$arrayRg[3].$arrayRg[4].".".$arrayRg[5].$arrayRg[6].$arrayRg[7]."-".$arrayRg[8];

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$email</td>
				<td>$cpf2</td>
				<td>$rg2</td>
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
	$(document).ready(function(){
		 $('#tabela').dataTable( {
            "language": {
                "url": "js/Portuguese-Brasil.json"
            }
        } );

	});
</script>