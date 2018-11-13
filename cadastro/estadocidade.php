<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $idCidade = $idEstado = $nomeEstado = $nomeCidade = $uf = $labelId = "";

    include "./app/conecta.php";

    if(isset($_GET["idc"])){
        $idCidade = trim($_GET["idc"]);

        $sql = "SELECT nome, estado_id FROM cidade WHERE id = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $idCidade);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);
            $nomeCidade = $dados->nome;
            $estado_id = $dados->estado_id;

            $labelId = "required";
    }
    
?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Cidade e Estado</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card-header">
            <h3 class="card-title text-center">Cadastro de Cidade</h3>
        </div>
        <form method="post" action="home.php?fd=salvar&pg=estadocidade" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly <?=$labelId?> class="form-control" value="<?=$idCidade?>">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required class="form-control" placeholder="Digite o nome da Cidade" value="<?=$nomeCidade?>">
            </div>
            <div class="form-group">
                <label for="estado_id">Estado:</label>
                <select name="estado_id" id="selectEstado" class="form-control">
                <?php
                    $consulta2 = $pdo->prepare("SELECT * FROM estado");
                    $consulta2->execute();
                    while($dados = $consulta2->fetch(PDO::FETCH_OBJ)){ 
                        echo "<option value='$dados->id'>$dados->nome</option>";
                    }

                ?>
                </select>
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
    </div><!-- fim do col-md-6 -->
    
    <div class="col-md-6">
        <div class="card-header">
            <h3 class="card-title text-center">Cadastro de Estado</h3>
        </div>
        <form method="post" action="home.php?fd=salvar&pg=estadocidade" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly <?=$labelId?> class="form-control" value="<?=$idEstado?>">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required class="form-control" placeholder="Digite o nome do Estado" value="<?=$nomeEstado?>">
            </div>
            <div class="form-group">
                <label for="uf">UF</label>
                <input type="text" name="uf" required class="form-control" data-mask="aa" placeholder="Digite a sigla do Estado" value="<?=$uf?>">
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
    </div><!-- fim do col-md-6 -->
</div><!-- fim do row -->
</form>
