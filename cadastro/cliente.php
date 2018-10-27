<?php

    $id = $nome = $login = $senha = $email = $telefone = $tipoUsuario = $ativo = $endereco = $cpf = $cep = $rg = "";
    $labelId = "";

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

                $labelId = "readonly";
                $labelSenha = "disabled";
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
        <input type="text" name="id" <?=$labelId?> class="form-control" id="labelID" value="<?=$id?>">
    </div>
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do Usuário" value="<?=$nome?>">
    </div>
    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" name="email" class="form-control" placeholder="Digite o E-Mail" value="<?=$email?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" <?=$labelSenha?>>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF" value="<?=$cpf?>">
        </div>
        <div class="form-group col-md-6">
            <label for="rg">RG:</label>
            <input type="text" name="rg" class="form-control" placeholder="Digite o RG" value="<?=$rg?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
          <label for="uf" class="input-label">Estado</label>
          <select name="uf" id="uf" class="form-control" required disabled data-target="#cidade">
                <option value="">Estado</option>
            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="cidade" class="input-label">Cidade</label>
          <select name="cidade" id="cidade" class="form-control" required disabled>
                <option value="">Cidade</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" class="form-control" placeholder="Digite o endereço" value="<?=$endereco?>">
    </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" class="form-control" placeholder="Digite o telefone" value="<?=$telefone?>">
    </div>
    <div class="form-group">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" class="form-control" placeholder="Digite o CPF" value="<?=$cep?>">
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
<?php
    if(isset($_GET["id"])){
      echo "<script>window.onload=()=>{
          document.getElementById('estado').selectedIndex = '<?=$estado?>';
          document.getElementById('cidade').selectedIndex = '<?=$cidade?>';
        }</script>";
    }



?>
<script type="text/javascript"> 
    var estados = [];

    function loadEstados(element) {
      if (estados.length > 0) {
        putEstados(element);
        $(element).removeAttr('disabled');
      } else {
        $.ajax({
          url: 'https://api.myjson.com/bins/enzld',
          method: 'get',
          dataType: 'json',
          beforeSend: function() {
            $(element).html('<option>Carregando...</option>');
          }
        }).done(function(response) {
          estados = response.estados;
          putEstados(element);
          $(element).removeAttr('disabled');
        });
      }
    }

    function putEstados(element) {

      var label = $(element).data('label');
      label = label ? label : 'Estado';

      var options = '<option value="">' + label + '</option>';
      for (var i in estados) {
        var estado = estados[i];
        options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
      }

      $(element).html(options);
    }

    function loadCidades(element, estado_sigla) {
      if (estados.length > 0) {
        putCidades(element, estado_sigla);
        $(element).removeAttr('disabled');
      } else {
        $.ajax({
          url: theme_url + '/assets/json/estados.json',
          method: 'get',
          dataType: 'json',
          beforeSend: function() {
            $(element).html('<option>Carregando...</option>');
          }
        }).done(function(response) {
          estados = response.estados;
          putCidades(element, estado_sigla);
          $(element).removeAttr('disabled');
        });
      }
    }

    function putCidades(element, estado_sigla) {
      var label = $(element).data('label');
      label = label ? label : 'Cidade';

      var options = '<option value="">' + label + '</option>';
      for (var i in estados) {
        var estado = estados[i];
        if (estado.sigla != estado_sigla)
          continue;
        for (var j in estado.cidades) {
          var cidade = estado.cidades[j];
          options += '<option value="' + cidade + '">' + cidade + '</option>';
        }
      }
      $(element).html(options);
    }

    document.addEventListener('DOMContentLoaded', function() {
      loadEstados('#uf');
      $(document).on('change', '#uf', function(e) {
        var target = $(this).data('target');
        if (target) {
          loadCidades(target, $(this).val());
        }
      });
    }, false);        
</script>   