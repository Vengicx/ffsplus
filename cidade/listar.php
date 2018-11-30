<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["fd"];
?>
<hr>
    <!--CIDADE -->
        <div class="card-header">
            <h1 class="card-title text-center">Lista de Cidades</h1>
        </div>
        <br>

        <a href="home.php?fd=cidade&pg=cadastro" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Novo</a>
        <table class="table table-bordered table-striped" id="tabela">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>UF</td>
                    <td>Opções</td>
                </tr>
            </thead>
        <?php

        include "./app/conecta.php";

        $tela = "cidade";

        $sql = "SELECT c.nome, e.uf, c.id FROM cidade c INNER JOIN estado e on c.estado_id = e.id";

        $query = $pdo->prepare($sql);
        $query->execute();

        while($data = $query->fetch(PDO::FETCH_OBJ)){
            $id = $data->id;
            $nome = $data->nome;
            $uf = $data->uf;

            echo "<tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$uf</td>
                    <td>
                        <a class='btn btn-success' href='home.php?fd=cidade&pg=cadastro&idc=$id'><i class='far fa-edit'></i></a>
                        <a href=\"javascript:excluir($id,'$nome','$tela')\" class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
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
	function excluir(id,nome,tela) {
		//pergunta e confirmar
		if ( confirm( "Deseja realmente excluir "+nome+" ? ") ) {
			//mandar excluir
			link = "home.php?fd=excluir&pg=excluircadastro&tela="+tela+"&id="+id;
			//chamar o link
			location.href = link;
		}
	}
</script>