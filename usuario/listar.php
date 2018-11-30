<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["fd"];
?>
	<h1 class="text-center">Lista de Usuários</h1>
	<br>

	<a href="home.php?fd=usuario&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
	<table class="table table-bordered table-striped" id="tabela">
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
	$sql = "SELECT * FROM usuario WHERE not tipoUsuario = 3";
	$consulta = $pdo->prepare($sql);
	$consulta->execute();
	while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
		$id = $dados->id;
		$nome = $dados->nome;
		$tipoUsuario = $dados->tipoUsuario;

		if($dados->status == 1){
			$status = "Ativo";
		}else{
			$status = "Inativo";
		}

		if($tipoUsuario == 1){
			$tipoUsuario = "Administrador";

		}elseif($tipoUsuario == 2){
			$tipoUsuario = "Garçom";
			
		}elseif($tipoUsuario == 4){
			$tipoUsuario = "Caixa";
			
		}elseif($tipoUsuario == 5){
			$tipoUsuario = "Cozinha";
			
		}elseif($tipoUsuario == 6){
			$tipoUsuario = "Entregador";
			
		}

		echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$status</td>
				<td id='tipoUsuario'>$tipoUsuario</td>
				<td>
					<a class='btn btn-success' href='home.php?fd=usuario&pg=cadastro&id=$id'><i class='far fa-edit'></i></a>
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
		if (confirm("Deseja realmente excluir "+nome+"?")){
			//mandar excluir
			link = "home.php?fd=excluir&pg=excluircadastro&tela=<?=$tela?>&id="+id;
			//chamar o link
			location.href = link;
		}
	}
</script>