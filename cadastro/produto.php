<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Produto</h3>
</div>
<form role="form">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" placeholder="Digite o nome do Produto">
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="precoCompra">Preço Compra:</label>
                <input type="number" class="form-control" placeholder="Digite o Preço de Compra">
            </div>
            <div class="form-group col-4">
                <label for="precoVenda">Preço Venda:</label>
                <input type="number" class="form-control" placeholder="Digite o preço de Venda">
            </div>
            <div class="form-group col-4">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" placeholder="Digite a Quantidade">
            </div>
        </div><!-- fim do row -->
    <div class="card-footer text-center mt-5">
        <button type="submit" class="btn btn-primary">Cadastrar/Alterar</button>
    </div>
</form>