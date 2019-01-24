<?php
    if(isset($_POST["idPizza"])){
        $idPizza = trim ($_POST["idPizza"]);

        if(isset($_POST["materiaprima"])){
            $idMateriaPrima = trim($_POST["materiaprima"]);

        }

        if(isset($_POST["quantidade"])){
            $quantidade = trim($_POST["quantidade"]);

        }
        require "./app/conecta.php";

        $sql = "INSERT INTO materiaprima_produto VALUES (NULL, :idMateriaPrima, :idProduto, :quantidade)";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':idMateriaPrima', $idMateriaPrima);
        $consulta->bindParam(':idProduto', $idPizza);
        $consulta->bindParam(':quantidade', $quantidade);

        $consulta->execute();
            echo "<script>alert('foi');</script>";
            exit;

    }else{
        echo "<script>alert('Selecione uma pizza para continuar');history.back();</script>";
        exit;
    }


?>