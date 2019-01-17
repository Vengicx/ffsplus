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
<form action="#" methd></form>
<?php
    require_once "./app/conecta.php";

    $consulta = $pdo->prepare("SELECT * FROM materiaprima ORDER BY nome");
    $consulta->execute();

    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
        $id = $dados->id;
        $nome = $dados->nome;
        $quantidade = $dados->quantidade;
        $precoCompra = $dados->precoCompra;

        echo "<div class='card materia-prima col-md-2' >
                  <div class='card-body'>
                      <h5 class='card-title' title='$nome'>$nome</h5>
                      <p class='card-text'>ID: $id </p>
                      <p class='card-text'>Custo: R$ $precoCompra </p>
                      <p class='card-text'>Em Estoque: $quantidade </p> 
                      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#$id'>Adicionar</button>
                  </div>
              </div> 
              <div class=\"modal fade\" id=\"$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Adicionar ao Carrinho</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        <div class=\"modal-body\">
                            <form method='post' action=''>
                            <label for='medida'>Selecione a Medida</label>
                            <select name='medida' class='form-control' required>
                                <option value=''>Selecione a medida</option>
                                <option value='kg'>Kilos - KG</option>
                                <option value='g'>Gramas - G</option>
                                <option value='l'>Litros - L</option>
                                <option value='ml'>Miligramas - ML</option>   
                            </select>
                            <br>
                            <label for='quantidade'>Quantidade</label>
                            <input name='quantidade' type='number' class='form-control' required>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                            <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>";

    
    }

?> 
    </form>
    </div>