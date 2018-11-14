<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $precoCompra = $precoVenda = "";

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Matéria-Prima</h3>
</div>
<form method="post" action="home.php?fd=salvar&pg=materiaprima" style="padding: 50px;">
        <div class="form-group">
            <label for="nome">ID:</label>
            <input type="text" class="form-control" readonly name="id">
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite o nome" required>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="precoCompra">Preço Compra:</label>
                <input type="text" name="precoCompra" class="form-control" placeholder="Digite o Preço de Compra" id="precoCompra" value="<?=$precoCompra?>" data-mask="9?99,99" required>
            </div>
            <div class="form-group col-4">
                <label for="qtdPedacos">Quantidade por Pedaço:</label>
                <input type="number" id="qtdPedacos" name="qtdPedacos" class="form-control" placeholder="Digite a Quantidade" required onkeyup="calcular()" required>
            </div>
            <div class="form-group col-4">
                <label for="precoUnidade">Preço por Unidade:</label>
                <input type="number" name="precoUnidade" id="resultado" class="form-control" required readonly>
            </div>
            <div class="form-group col-4">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control">
            </div>
        </div><!-- fim do row -->
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
<script language="javascript">   
    function calcular(){
        var precoCompra = parseInt(document.getElementById('precoCompra').value);
        var qtdPedacos = parseInt(document.getElementById('qtdPedacos').value);
        var preco = precoCompra / qtdPedacos;
        var resultado = parseFloat(document.getElementById('resultado').value = preco.toFixed(2));
        
    }
</script>