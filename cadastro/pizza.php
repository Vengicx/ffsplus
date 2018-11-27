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
    <form name="materiaprimas" action="#" method="post">
        <div class="card carrinho" style="width: 20em;">
            <div class="card-body">
                <h5 class="card-title">Cadastro de Novo Produto</h5>
            </div>
              <table class="table table-striped text-center">
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Matéria-Prima</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    	if(isset($_POST["id"])){
                            $id = $_POST["id"];

                            foreach ($id as $values){
                                
                                echo "<tr>
                                        <td>$values</td>
                                        <td>Nome</td>
                                </tr>";
                                
                            }  
                    
                        }
                            
                    ?>
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
                      <p class='card-text'>ID: $id </p>
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