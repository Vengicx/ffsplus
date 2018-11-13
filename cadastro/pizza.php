<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }
    
?>
<style>
    .materia-prima{
        float: left;
        margin: 10px;
        padding: -5px;
    }

    .carrinho {
      float: right;
      margin: 2em;
    }
</style>
    <h1 class="text-center">Cadastro de Nova Pizza</h1>
    
    <div class="row">
    <form name="materiaprimas" action="home.php?fd=salvar&pg=pizza" method="post">
        <div class="card carrinho" style="width: 20em;">
            <div class="card-body">
                <h5 class="card-title">Cadastro de Novo Produto</h5>
            </div>
              <table class="table table-striped text-center">
                  <thead>
                      <tr>
                          <th scope="col">Qtd</th>
                          <th scope="col">Matéria-Prima</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>2</td>
                          <td title="Nome completo do produto">Mussarela</td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td title="Nome completo do produto">Trigo</td>
                      </tr>
                      <tr>
                          <td>10</td>
                          <td title="Nome completo do produto">Tomate</td>
                      </tr>
                  </tbody>
              </table>
            <div class="card-body">
                <a href="#" class="btn btn-success">Cadastrar</a>
                <a href="#" class="btn btn-warning">Limpar</a>
            </div>
        </div>
<?php
    require_once "./app/conecta.php";
    require_once "./app/funcoes.php";

    $consulta = $pdo->prepare("SELECT * FROM materiaprima order by nome");
    $consulta->execute();

    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
        $id = $dados->id;
        $nome = $dados->nome;
        $quantidade = $dados->quantidade;
        $precoCompra = $dados->precoCompra;

        $titulo = $nome;
        $nome = limitarTexto($nome, 17);


        echo "<div class='card materia-prima col-md-3' >
                  <div class='card-body'>
                      <h5 class='card-title' title='$titulo'>$nome</h5>
                      <p class='card-text'>Custo: R$ $precoCompra </p>
                      <p class='card-text'>Em Estoque: $quantidade </p> 
                      <div data-toggle='buttons'>
                          <label class='btn btn-primary'>
                              <input type='checkbox' autocomplete='off' name='id[]' value='$id'> Adicionar
                          </label>
                      </div>
                  </div>
              </div>";
    
    }

?> 
    <button type="submit" class="btn btn-success">GO!</button> 
    </form>
    </div>