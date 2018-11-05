<?php

    $id = $nome = $login = $senha = $email = $telefone = $tipoUsuario = $ativo = $endereco = $cpf = $cep = $rg = $labelId = "";

    if(isset($_GET["id"])){
        $id = trim($_GET["id"]);  

        include "./app/conecta.php";

        $sql = "SELECT * FROM usuario WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($consulta->execute()){
            $dados = $consulta->fetch(PDO::FETCH_OBJ);
                $nome = $dados->nome;
                $login = $dados->login;
                $email = $dados->email;
                $cpf = $dados->cpf;
                $status = $dados->status;
                $endereco = $dados->endereco;
                $cep = $dados->cep;
                $rg = $dados->rg;

                $labelSenha = "disabled";
                $labelId = "required";
        }
    }else{//se nao receber o id pelo GET
        $labelSenha = "required placeholder=\"Digite uma senha\"";

    }

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Cliente</h3>
</div>
<form method="post" action="home.php?fd=salvar&pg=cliente" style="padding: 50px;">
    <div class="form-group">
        <label for="id">ID: </label>
        <input type="text" name="id" readonly <?=$labelId?> class="form-control" id="labelID" value="<?=$id?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required class="form-control" placeholder="Digite o nome do Usuário" value="<?=$nome?>">
    </div>
    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" name="email" required class="form-control" placeholder="Digite o E-Mail" value="<?=$email?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" <?=$labelSenha?>>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required class="form-control" data-mask="999.999.999-99" placeholder="Digite o CPF" value="<?=$cpf?>">
        </div>
        <div class="form-group col-md-6">
            <label for="rg">RG:</label>
            <input type="text" name="rg" required class="form-control" data-mask="99.999.999-9" placeholder="Digite o RG" value="<?=$rg?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
            <?php
                include_once "app/conecta.php";
            
                $consulta = $pdo->prepare("SELECT * FROM estado");
                $consulta->execute();
                while($dados = $consulta->fetch(PDO::FETCH_OBJ)){ 
                    echo "<option value='$dados->id'>$dados->nome</option>";
                    
                }

            ?>
            </select>  
        </div>
        <div class="form-group col-md-6">
            <label for="cidade" class="input-label">Cidade</label>
            <select name="cidade" id="cidade" class="form-control" required>
                <?php
                    include_once "app/conecta.php";
                    
                    $consulta = $pdo->prepare("SELECT * FROM cidade");
                    $consulta->execute();
                    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                        $nome = $dados->nome;
                        echo "<option value='$nome'>$nome</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required class="form-control" placeholder="Digite o endereço" value="<?=$endereco?>">
    </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required class="form-control" data-mask="(99) 9999-9999" placeholder="Digite o telefone" value="<?=$telefone?>">
    </div>
    <div class="form-group">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" required class="form-control" data-mask="99999-999" placeholder="Digite o CPF" value="<?=$cep?>">
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