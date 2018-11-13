<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

	$tela = $_GET["pg"];
?>
<hr>
<div class="row">
    <!--CIDADE -->
    <div class="col-md-6">
        <div class="card-header">
            <h1 class="card-title text-center">Lista de Cidades</h1>
        </div>
        <br>

        <table class="table table-bordered table-striped">
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
                        <a class='btn btn-success' href='home.php?fd=cadastro&pg=estadocidade&tela=cidade&idc=$id'><i class='fa fa-pencil'></i></a>
                        <a href=\"javascript:excluir($id,'$nome','$tela')\" class='btn btn-danger'><i class='fa fa-trash'></i></a>
                    </td>
                </tr>";
                
        }
    ?>
        </table>
    </div>
    <!-- ESTADO -->
    <div class="col-md-6">
        <div class="card-header">
            <h1 class="card-title text-center">Lista de Estados</h1>
        </div>
        <br>

        <table class="table table-bordered table-striped">
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

        $tela = "estado";

        $sql = "SELECT * FROM estado";
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
                        <a class='btn btn-success' href='home.php?fd=cadastro&pg=estadocidade&tela=estado&ide=$id'><i class='fa fa-pencil'></i></a>
                        <a href=\"javascript:excluir($id,'$nome','$tela')\" class='btn btn-danger'><i class='fa fa-trash'></i></a>
                    </td>
                </tr>";
                
        }
    ?>
        </table>
    </div><!-- fim do estado -->
</div><!-- fim do row -->
<script>	
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