<?php
    if(isset($_POST["nome"])){
        $nome = trim ($_POST["nome"]);

    }

    if(isset($_POST["tamanho"])){
        $tamanho = trim ($_POST["tamanho"]);

    }

    if(isset($_POST["precoVenda"])){
        $precoVenda = trim ($_POST["precoVenda"]);

    }

    if(empty($nome)){
        echo "<script>alert('Digite o nome da Pizza');history.back();</script>";
        exit;

    }elseif(empty($tamanho)){
        echo "<script>alert('Escolha o tamanho da Pizza');history.back();</script>";
        exit;

    }elseif(empty($precoVenda)){
        echo "<script>alert('Escolha o tamanho da Pizza');history.back();</script>";
        exit;
    }

    include "./app/conecta.php";

    $qtd = 0;
    $tipoProduto = 1;
    $sql = "INSERT INTO produto (id, nome, idTamanho, precoVenda, quantidade, tipoProduto) VALUES (NULL, :nome ,:idTamanho, :precoVenda, :quantidade, :tipoProduto)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':idTamanho', $tamanho);
    $consulta->bindParam(':precoVenda', $precoVenda);
    $consulta->bindParam(':quantidade', $qtd);
    $consulta->bindParam(':tipoProduto', $tipoProduto);

    if($consulta->execute()){
        echo "<script>alert('Pizza cadastrada com sucesso!');location.replace('home.php?fd=pizza&pg=listar')</script>";
        exit;
        
    }

?>