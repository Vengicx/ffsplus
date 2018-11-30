<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $id = $nome = $qtdPedacos = $qtdSabores = $labelId = "";

?>
<div class="card-header">
    <h3 class="card-title text-center">Novo Pedido</h3>
</div>
<form method="post" action="home.php?fd=pedido&pg=salvarPedido" style="padding: 50px;">
        <div class="form-group">
            <label for="nome">ID:</label>
            <input type="text" name="id" class="form-control" value="<?=$id?>" readonly <?=$labelId?>>
        </div>
        <div class="form-group">
            <label for="nome">Nome do Cliente:</label>
            <select class="form-control" name="usuario_id" required>
            <option value="">Selecione um cliente</option>
                    <?php
                        include_once "app/conecta.php";
                        $sql = "SELECT * FROM usuario WHERE tipoUsuario = 3";
                        $consulta = $pdo->prepare($sql);
                        $consulta->execute();
                        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                            echo"<option value='$dados->id'>$dados->nome</option>";
                        }
                    ?>
                </select> 
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="produto_id">Sabor</label>
                <select class="form-control" name="produto_id" required>
                    <option value="">Selecione um sabor</option>
                    <?php
                        include_once "app/conecta.php";
                        $sql = "SELECT * FROM produto WHERE tipoProduto = 1";
                        $consulta = $pdo->prepare($sql);
                        $consulta->execute();
                        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                            echo"<option value='$dados->id'>$dados->nome</option>";
                        }
                    ?>
                </select>   
            </div>
            <div class="form-group col-6">
                <label for="tamanho_id">Tamanho</label>
                <select class="form-control" name="tamanho_id" required>
                <option value="">Selecione um tamanho</option>
                    <?php
                        include_once "app/conecta.php";
                        $sql = "SELECT * FROM tamanho";
                        $consulta = $pdo->prepare($sql);
                        $consulta->execute();
                        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                            echo"<option value='$dados->id'>$dados->nome</option>";
                        }
                    ?>
                </select>
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