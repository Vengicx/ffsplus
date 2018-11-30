<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }
    
    if(isset($_POST["id"])){
        $id = trim($_POST["id"]);

    }
    
    if(isset($_POST["nome"])){
        $nome = trim($_POST["nome"]);

    }

    if(isset($_POST["uf"])){
        $uf = trim($_POST["uf"]);

    }

    if(empty($nome)){
        echo "<script>echo('Digite um nome');history.back();</script>";
        exit;

    }else{
        include "app/conecta.php";

        if(empty($id)){

            $acao = "inserido";

            $sql = "INSERT INTO estado (id, nome, uf) VALUES (NULL, :nome, :uf)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(':nome', $nome);
            $consulta->bindParam(':uf', $uf);

        }else{

            $acao = "modificado";

            $sql = "UPDATE estado SET nome = :nome, uf = :uf WHERE id = :id LIMIT 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(':nome', $nome);
            $consulta->bindParam(':uf', $uf);

        }

        if($consulta->execute()){
            echo "<script>alert('Estado $acao com sucesso!');location.replace('home.php?fd=listas&pg=estadocidade')</script>";
            exit;
            
        }else{
            echo $consulta->errorInfo()[2];
            echo "<script>alert('Não foi possível realizar a requisição');history.back();</script>";
            exit;
            
        }
    }

?>