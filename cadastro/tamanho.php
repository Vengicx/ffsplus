<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $id = $nome = $qtdPedacos = $qtdSabores = $labelId = "";

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $labelId = "required";

        require_once "app/conecta.php";

        $sql = "select * from tamanho where id = ? limit 1";
        $query = $pdo->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_OBJ);
            $nome = $data->nome;
            $qtdPedacos = $data->qtdPedacos;
            $qtdSabores = $data->qtdSabores;

    }

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Tamanho</h3>
</div>
<form method="post" action="home.php?fd=salvar&pg=tamanho" style="padding: 50px;">
        <div class="form-group">
            <label for="nome">ID:</label>
            <input type="text" name="id" class="form-control" value="<?=$id?>" readonly <?=$labelId?>>
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?=$nome?>" placeholder="Digite o nome do Tamanho" required>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="precoCompra">Quantidade de Pedaços</label>
                <input type="number" name="qtdPedacos" class="form-control" value="<?=$qtdPedacos?>" placeholder="Digite a quantidade de pedaços" required>
            </div>
            <div class="form-group col-6">
                <label for="precoVenda">Quantidade Máxima de Sabores</label>
                <input type="number" name="qtdSabores" class="form-control" value="<?=$qtdSabores?>" placeholder="Digite a quantidade máxima" required>
            </div>
        </div>
    <div class="card-footer text-center mt-5">
        <?php 
            if(isset($_GET["id"])){
                $btnForm = "Alterar";
            }else{
                $btnForm = "Cadastrar";
            }

        ?>
            <button type="submit" class="btn btn-primary"><?=$btnForm?></button>
    </div>
</form>