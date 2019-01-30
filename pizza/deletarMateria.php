<?php
    if(isset($_POST["idPizza"])){
        $idPizza = trim ($_POST["idPizza"]);

        if(isset($_POST["id"])){
            $idMateriaPrima = trim($_POST["id"]);

        }

        require "./app/conecta.php";

        $pdo->beginTransaction();

        $sql = "DELETE FROM materiaprima_produto WHERE idMateriaPrima = :idMateriaPrima AND idProduto = :idProduto";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':idMateriaPrima', $idMateriaPrima, PDO::PARAM_INT);
        $consulta->bindParam(':idProduto', $idPizza, PDO::PARAM_INT);

        if($consulta->execute()){
            echo "<script>location.replace('home.php?fd=pizza&pg=editarPizza&idPizza=$idPizza')</script>";
            $pdo->commit();
            exit;
        }else{
            echo "<script>alert('Erro ao excluir matéria-prima');history.back();</script>";
            $pdo->rollBack();
            exit;
        }  

    }else{
        echo "<script>alert('Selecione uma pizza para continuar');history.back();</script>";
        exit;
    }


?>