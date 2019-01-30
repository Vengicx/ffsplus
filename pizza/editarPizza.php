<?php
    if(isset($_GET["idPizza"])){
        $idPizza = trim ($_GET["idPizza"]);

        include "./app/conecta.php";

        $sql = "SELECT tipoProduto, nome FROM produto WHERE id = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $idPizza);
        if($consulta->execute()){
            $dados = $consulta->fetch(PDO::FETCH_OBJ);
            $tipoProduto = $dados->tipoProduto;

            if($tipoProduto != 1){
                echo "<script>alert('Produto inválido');history.back();</script>";
                exit;
            }
        }

?>
<h4 class="text-center">Sabor: <?=$dados->nome?></h4>
<hr>
<div class="row">
    <div class="col-md-7">
        <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                </div>
            <form action="#" method="post">
                <input type="search" name="procurar" class="form-control" id="inlineFormInputGroup" placeholder="Procurar">
            </form>
        </div>
        <div id="listaMateria">
        <?php
        if(isset($_POST["procurar"])){
            $nome = trim ($_POST["procurar"]);
            $nome = "%$nome%";

            $sql = "SELECT * FROM materiaprima WHERE nome LIKE ?";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1, $nome);
            
            
        }else{
            $sql = "SELECT * FROM materiaprima ORDER BY nome";
            $consulta = $pdo->prepare($sql);

        }
        
        $consulta->execute();
            while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                $id = $dados->id;
                $nome = $dados->nome;
                $precoCompra = $dados->precoCompra;

                $sql2 = "SELECT idMateriaPrima FROM materiaprima_produto WHERE idmateriaprima = :idMateriaprima AND idProduto = :idProduto";
                $consulta2 = $pdo->prepare($sql2);
                $consulta2->bindParam(':idProduto', $idPizza);
                $consulta2->bindParam(':idMateriaprima', $id);
                $consulta2->execute();

                $dados2 = $consulta2->fetch(PDO::FETCH_OBJ);

                if($dados2 == NULL){
                    $botao = "<button type='button' class='btn btn-primary' data-target='#$id' data-toggle='modal'><i class='far fa-plus-square'></i></button>";

                }else{
                    $botao = "<button type='button' class='btn btn-success' data-target='#$id' data-toggle='modal'><i class='fas fa-edit'></i></button>
                            <button type='button' class='btn btn-danger' data-target='#del$id' data-toggle='modal'><i class='fas fa-trash-alt'></i></button>";
                }

                echo "          
                        <div class='card materia-prima col-md-3 float-left' style='margin: 10px; height: 160px'>
                            <div class='card-body'>
                                <h5 class='card-title' title='$nome'>$nome</h5>
                                <p class='card-text'>ID: $id </p>
                                $botao
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
                                        <form method='post' action='home.php?fd=pizza&pg=salvarMateria'>
                                            <input name='idPizza' type='hidden' value='$idPizza'>
                                            <label for='id'>ID: </label>
                                            <input name='id' class='form-control' value='$id' readonly>
                                            <br>
                                            <label for='materiaprima'>Nome</label>
                                            <input name='materiaprima' type='text' class='form-control' readonly value='$nome'>
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
                        </div>
                        
                        <div class=\"modal fade\" id=\"del$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
                            <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Deletar do Carrinho?</h5>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    </div>
                                    <div class=\"modal-body\">
                                        <form method='post' action='home.php?fd=pizza&pg=deletarMateria'>
                                            <input name='idPizza' type='hidden' value='$idPizza'>
                                            <label for='id'>ID: </label>
                                            <input name='id' class='form-control' value='$id' readonly>
                                            <br>
                                            <label for='materiaprima'>Nome</label>
                                            <input name='materiaprima' type='text' class='form-control' readonly value='$nome'>
                                    </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                                            <button type=\"submit\" class=\"btn btn-danger\">Deletar</button>
                                        </form>
                                        </div>
                                </div>
                            </div>
                        </div>";

                    }
                    
                }else{
                    echo "<script>alert('Nenhuma pizza selecionada');history.back();</script>";
                    exit;
                }
        ?>
        </div><!-- fim do scroll-->
    </div><!-- fim do col-md-8 -->
    <div class="col-md-4 float-right">
        <h3 class="text-center">Matérias Primas Adicionadas</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class='table-active'>
                    <th scope='col'>Matéria Prima</th>
                    <th scope='col'>Qtd</th>
                    <th scope='col'>Custo</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql2 = "SELECT m.nome AS nome_materia, aux.quantidade 
                            FROM materiaprima_produto aux 
                            INNER JOIN materiaprima m 
                            ON aux.idMateriaPrima = m.id WHERE idProduto = ?;";
                $consulta2= $pdo->prepare($sql2);
                $consulta2->bindParam(1, $idPizza);
                $consulta2->execute();
                while($dados2 = $consulta2->fetch(PDO::FETCH_OBJ)){
                    echo "
                    <tr>
                    <td>$dados2->nome_materia</td>
                    <td>$dados2->quantidade</td>
                    <td>0,00</td>
                </tr>
                    ";
                }

            ?>
            </tbody>
        </table>
        <p class="float-left">Custo de Produção Total: R$ 50,00</p>
        <button class="btn btn-primary float-right">Finalizar</button>
    </div>
</div>