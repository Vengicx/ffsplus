<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $precoCompra = $precoVenda = $nome = $id = $idtipomateria = $quantidade = $precoUnidade = $labelId = $labelQtd = "";

    if(isset($_GET["id"])){
        $id = trim ($_GET["id"]);

        include_once "app/conecta.php";

        $sql = "SELECT * FROM materiaprima WHERE id = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $id);
        
        if($consulta->execute()){
            $dados = $consulta->fetch(PDO::FETCH_OBJ);
                $nome = $dados->nome;
                $precoCompra = $dados->precoCompra;
                $quantidade = $dados->quantidade;
                $precoUnidade = $dados->precoUnidade;
                $idtipomateria = $dados->idtipomateria;

                $labelQtd = "readonly";
                $labelId = "required";

                $precoCompra = str_replace(".", ",", $precoCompra);
        }
        
    }

?>
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Matéria-Prima</h3>
</div>
<form method="post" action="home.php?fd=materiaprima&pg=salvar" style="padding: 50px;">
        <div class="form-group">
            <label for="nome">ID:</label>
            <input type="text" class="form-control" readonly <?=$labelId?> name="id" value="<?=$id?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite o nome" required value="<?=$nome?>">
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="precoCompra">Preço Compra:</label>
                <input type="text" name="precoCompra" class="form-control" onKeyPress="return(moeda(this,'.',',',event))" placeholder="Digite o Preço de Compra" id="precoCompra" value="<?=$precoCompra?>" required>
            </div>
            <div class="form-group col-4">
                <label for="idtipomateria">Tipo Matéria:</label>
                <select name="idtipomateria" id="idtipomateria" required value="<?=$idtipomateria?>" class="form-control">
                <?php 
                    include_once "app/conecta.php";
                    $sql = "SELECT id, descricao, upper(sigla) as sigla FROM tipomateria";
                    $consulta = $pdo->prepare($sql);
                    $consulta->execute();

                    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                        echo "<option name='$dados->id'>$dados->sigla - $dados->descricao</option>";
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="qtdEmbalagem">Quantidade Embalagem</label>
                <input type="number" name="qtdEmbalagem" class="form-control" placeholder="Digite o Preço de Compra" id="qtdEmbalagem" required>
            </div>
            <!-- <div class="form-group col-4">
                <label for="precoUnidade">Preço por Unidade:</label>
                <input type="number" name="precoUnidade" id="resultado" onKeyPress="return(moeda(this,'.',',',event))" class="form-control" required readonly value="<?=$precoUnidade?>">
            </div> -->
            <div class="form-group col-4">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" <?=$labelQtd?> value="<?=$quantidade?>">
            </div>
        </div><!-- fim do row -->
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
<script language="javascript">  

     function calcular(){
        var precoCompra = parseInt(document.getElementById('precoCompra').value);
        var idtipomateria = parseInt(document.getElementById('idtipomateria').value);
        var preco = precoCompra / idtipomateria;
        var resultado = parseFloat(document.getElementById('resultado').value = preco.toFixed(2));
        
    }

    function moeda(a, e, r, t) {
        let n = ""
          , h = j = 0
          , u = tamanho2 = 0
          , l = ajd2 = ""
          , o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
        for (l = ""; h < u; h++)
            -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "0" + r + "0" + l),
        2 == u && (a.value = "0" + r + l),
        u > 2) {
            for (ajd2 = "",
            j = 0,
            h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                j = 0),
                ajd2 += l.charAt(h),
                j++;
            for (a.value = "",
            tamanho2 = ajd2.length,
            h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
</script>