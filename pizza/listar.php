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

</style>
    <h1 class="text-center">Lista de Pizzas</h1>
<?php
    require_once "./app/conecta.php";

    $consulta = $pdo->prepare("SELECT * FROM produto WHERE tipoProduto = 1");
    $consulta->execute();

    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
        $id = $dados->id;
        $nome = $dados->nome;

        echo "
            <div class='card materia-prima col-md-2' >
                <div class='card-body'>
                    <h5 class='card-title' title='$nome'>$nome</h5>
                    <p class='card-text'>ID: $id </p>
                    <p class='card-text'>Qtd. Produzida: 20</p>
                    <a href='home.php?fd=pizza&pg=editarPizza&idPizza=$id'><button type='button' class='btn btn-success'><i class='fas fa-edit'></i></button></a>
                </div>
            </div> 
            ";
    }

?> 
    </div>