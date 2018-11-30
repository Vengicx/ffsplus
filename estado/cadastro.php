<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $idEstado = $nomeEstado = $uf = $labelId = "";

    include "./app/conecta.php";


    if(isset($_GET["ide"])){
        $idEstado = trim($_GET["ide"]);

        $sql = "SELECT nome, uf FROM estado WHERE id = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $idEstado);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);
            $nomeEstado = $dados->nome;
            $uf = $dados->uf;

            $labelId = "required";
    }
?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Estado</h3>
</div>
    <!-- ESTADO -->
        <form method="post" action="home.php?fd=estado&pg=salvar" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly <?=$labelId?> class="form-control" value="<?=$idEstado?>">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required class="form-control" placeholder="Digite o nome do Estado" value="<?=$nomeEstado?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" required class="form-control" data-mask="aa" placeholder="Digite a sigla do Estado" value="<?=$uf?>">
                    </div>
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
</form>
