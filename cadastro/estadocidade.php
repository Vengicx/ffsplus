<?php
    if ( !isset ( $page ) ) {
        echo "Acesso negado";
        exit;
    }

    $id = $nomeEstado = $labelId = $nomeCidade = $uf = "";
    
    include "./app/conecta.php";

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Cidade e Estado</h3>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card-header">
            <h3 class="card-title text-center">Cadastro de Cidade</h3>
        </div>
        <form method="post" action="home.php?fd=salvar&pg=cidadeestado" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly <?=$labelId?> class="form-control" value="<?=$id?>">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required class="form-control" placeholder="Digite o nome da Cidade" value="<?=$nomeCidade?>">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" class="form-control">
                <?php
                    $consulta = $pdo->prepare("SELECT * FROM estado");
                    $consulta->execute();
                    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){ 
                        echo "<option value='$dados->uf'>$dados->nome</option>";
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
        <form method="post" action="home.php?fd=salvar&pg=cidadeestado" style="padding: 30px;">
            <div class="form-group">
                <label for="id">ID: </label>
                <input type="text" name="id" readonly <?=$labelId?> class="form-control" value="<?=$id?>">
            </div>
            <div class="form-group">
                <label for="estado">Nome:</label>
                <input type="text" name="estado" required class="form-control" placeholder="Digite o nome do Estado" value="<?=$nomeEstado?>">
            </div>
            <div class="form-group">
                <label uf="estado">UF</label>
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