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
        $ativo = $dados->ativo;

        if($ativo == 1){
            $icon = "lock";
            $button = "<button type=\"submit\" class=\"btn btn-warning\">Inativar</button>";
            $acao = "Deseja inativar a Pizza?";

        }else{
            $icon = "unlock";
            $button = "<button type=\"submit\" class=\"btn btn-success\">Ativar</button>";
            $acao = "Deseja ativar a Pizza?";
        }

        echo "
            <div class='card materia-prima col-md-2' >
                <div class='card-body'>
                    <h5 class='card-title' title='$nome'>$nome</h5>
                    <p class='card-text'>ID: $id </p>
                    <p class='card-text'>Qtd. Produzida: 20</p>
                    <a href='home.php?fd=pizza&pg=editarPizza&idPizza=$id'><button type='button' class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                        <button type='button' class='btn btn-secondary' data-target='#lock$id' data-toggle='modal'><i class='fas fa-$icon'></i></button>
                        <button type='button' class='btn btn-danger' data-target='#del$id' data-toggle='modal'><i class='fas fa-trash-alt'></i></button>
                </div>
            </div>

            <div class=\"modal fade\" id=\"del$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Deseja Deletar a Pizza?</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        <div class=\"modal-body\">
                            <form method='post' action='home.php?fd=pizza&pg=deletarPizza'>
                                <input name='idPizza' type='hidden' value='$id'>
                                <label for='id'>ID: </label>
                                <input name='id' class='form-control' value='$id' readonly>
                                <br>
                                <label for='nome'>Nome</label>
                                <input name='nome' type='text' class='form-control' readonly value='$nome'>
                                <hr>
                                <p>Cuidado! Caso você delete você não poderá fazer novos pedidos com esse sabor nunca mais! 
                                Caso desejar, será obrigado a cadastrar todo o modo de preparo novamente!</p>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                            <button type=\"submit\" class=\"btn btn-danger\">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class=\"modal fade\" id=\"lock$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">$acao</h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <p>*Não será possível realizar novos pedidos desse sabor se inativado!</p>
                        <form method='post' action='home.php?fd=pizza&pg=inativar'>
                            <input name='idPizza' type='hidden' value='$id'>
                            <label for='id'>ID: </label>
                            <input name='id' class='form-control' value='$id' readonly>
                            <br>
                            <label for='nome'>Nome</label>
                            <input name='cadeado' type='hidden' value='$icon'>
                            <input name='nome' type='text' class='form-control' readonly value='$nome'>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                        $button
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

?> 
    </div>