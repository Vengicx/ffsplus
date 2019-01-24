<?php
    include "./app/conecta.php";
    $qtd = 0;
    $tipoProduto = 1;
    $sql = "INSERT INTO produto (id, nome, idTamanho, precoVenda, quantidade, tipoProduto) VALUES (NULL, :nome ,:idTamanho, :precoVenda, :quantidade, :tipoProduto)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':nome', $_POST["nome"]);
    $consulta->bindParam(':idTamanho', $_POST["tamanho"]);
    $consulta->bindParam(':precoVenda', $_POST["precoVenda"]);
    $consulta->bindParam(':quantidade', $qtd);
    $consulta->bindParam(':tipoProduto', $tipoProduto);

    if($consulta->execute()){
        echo "<script>alert('Pizza cadastrada com sucesso!');history.back();</script>";
        exit;
        
    }






?>