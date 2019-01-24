<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Produto</h3>
</div>
        <form method="post" action="home.php?fd=pizza&pg=salvar" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tamanho">Tamanho</label>
                        <select class="form-control" name="tamanho">  
                            <?php
                                include "./app/conecta.php";

                                $sql = "SELECT id,nome FROM tamanho";
                                $consulta = $pdo->prepare($sql);

                                $consulta->execute();
                                while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                                    echo "<option value='$dados->id'>$dados->nome</input>";

                                }

                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="precoVenda">Valor de Venda:</label>
                <input type="number" name="precoVenda" required class="form-control">
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
</form>
