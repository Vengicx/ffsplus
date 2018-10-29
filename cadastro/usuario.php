<?php
    if ( !isset ( $page ) ) {
        echo "Acesso negado";
        exit;
    }

    $id = $nome = $login = $senha = $email = $tipoUsuario = $ativo = "";

    $labelLogin = $labelId = "readonly";

    if(isset($_GET["id"])){
        $id = trim($_GET["id"]);

        $labelSenha = "placeholder=\"Digite uma nova senha (Se necessário)\"";

        include "./app/conecta.php";

        $sql = "SELECT * FROM usuario WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($consulta->execute()){
            $dados = $consulta->fetch(PDO::FETCH_OBJ);
                $nome = $dados->nome;
                $login = $dados->login;
                $email = $dados->email;
                $tipoUsuario = $dados->tipoUsuario;
                $status = $dados->status;
        }

    }else{//se nao receber o id pelo GET
        $labelLogin = "required";
        $labelSenha = "required placeholder=\"Digite uma senha\"";

    }

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Usuário</h3>
</div>
<form method="post" action="home.php?fd=salvar&pg=usuario" class="form-ffs" style="padding: 50px;">
    <div class="form-group">
        <label for="id">ID: </label>
        <input type="text" name="id" <?=$labelId?> class="form-control" id="labelID" value="<?=$id?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do Usuário" value="<?=$nome?>">
    </div>
    <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" name="login" class="form-control" <?=$labelLogin?> placeholder="Digite o login" value="<?=$login?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" <?=$labelSenha?> value="<?=$senha?>">
    </div>
    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" name="email" class="form-control" placeholder="Digite o E-Mail" value="<?=$email?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group"><!-- select do tipos de Usuários -->
                <label for="tipoUsuario">Tipo Usuário:</label>
                <select name="tipoUsuario" id="tipoUsuario" multiple class="form-control" required data-parsley-required-message="Selecione uma opção" value="<?=$tipoUsuario?>">
                    <option value="2">Garçom</option>
                    <option value="4">Caixa</option>
                    <option value="5">Cozinha</option>
                    <option value="6">Entregador</option>
                    <option value="1">Administrador</option>
                </select>
            </div>
        </div><!-- fim do col md 6-->
        <div class="col-md-6">
            <label class="form-check-label">Status:</label>
            <div class="form-group">
                <div class="form-check" id="ativo">
                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                    <label class="form-check-label" for="ativo">Ativo</label>
                    <br>
                    <input class="form-check-input" type="radio" name="status" value="2">
                    <label class="form-check-label" for="inativo">Inativo</label>
                </div>
            </div>
        </div>
    </div><!-- fim do row-->
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
<script>
    window.onload=()=>{
        document.getElementById("tipoUsuario").selectedIndex = "<?=$tipoUsuario?>";
    }

</script>