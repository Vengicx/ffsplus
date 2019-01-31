<?php
    if(isset($_POST["idPizza"])){
        $idPizza = trim ($_POST["idPizza"]);

        if(isset($_POST["id"])){
            $idMateriaPrima = trim($_POST["id"]);

        }

        if(isset($_POST["quantidade"])){
            $quantidade = trim($_POST["quantidade"]);

        }
        require "./app/conecta.php";

        $pdo->beginTransaction();

        $sql = "INSERT INTO materiaprima_produto (idMateriaPrima, idProduto, quantidade) VALUES (:idMateriaPrima, :idProduto, :quantidade)";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':idMateriaPrima', $idMateriaPrima, PDO::PARAM_INT);
        $consulta->bindParam(':idProduto', $idPizza, PDO::PARAM_INT);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);

        if($consulta->execute()){
            echo "<script>location.replace('home.php?fd=pizza&pg=editarPizza&idPizza=$idPizza')</script>";
            $pdo->commit();
            exit;
        }else{
            echo "<script>alert('Erro ao inserir matéria-prima');history.back();</script>";
            $pdo->rollBack();
            exit;
        }
            

    }else{
        echo "<script>alert('Selecione uma pizza para continuar');history.back();</script>";
        exit;
    }


?>