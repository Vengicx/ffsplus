<?php

    if(isset($_POST["id"])){
        $id = trim($_POST["id"]);

    }
    
    if(isset($_POST["nome"])){
        $nome = trim($_POST["nome"]);

    }

    if(isset($_POST["uf"])){
        $uf = trim($_POST["uf"]);

    }

    if(isset($_POST["estado_id"])){
        $estado_id = trim ($_POST["estado_id"]);
        
    }

    if(empty($nome)){
        echo "<script>echo('Digite um nome');history.back();</script>";

    }elseif(empty($estado)){
        echo "<script>echo('Digite um estado');history.back();</script>";

    }

        include "app/conecta.php";

        if(isset($uf)){
            $alert = "Estado";
    
        }else{
            $alert = "Município";

        }

        if(empty($id)){

            $acao = "inserido";

            if(isset($uf)){
                $sql = "INSERT INTO estado (id, nome, uf) VALUES (NULL, :nome, :uf)";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(':nome', $nome);
                $consulta->bindParam(':uf', $uf);

            }elseif(isset($estado_id)){
                $sql = "INSERT INTO cidade (id, nome, estado_id) VALUES (NULL, :nome, :estado_id)";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(':nome', $nome);
                $consulta->bindParam(':estado_id', $estado_id);

            }

        }else{

            $acao = "modificado";

            if(isset($uf)){
                $sql = "UPDATE estado SET nome = :nome, uf = :uf WHERE id = :id LIMIT 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(':nome', $nome);
                $consulta->bindParam(':uf', $uf);

            }elseif(isset($estado_id)){
                $sql = "UPDATE cidade SET nome = :nome, estado_id = :estado_id WHERE id = :id LIMIT 1";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(':nome', $nome);
                $consulta->bindParam(':estado_id', $estado_id);
                $consulta->bindParam(':id', $id);
             
            }
        }

        if($consulta->execute()){
            echo "<script>alert('$alert $acao com sucesso!');location.replace('home.php?fd=listas&pg=estadocidade')</script>";
            
        }else{
            echo $consulta->errorInfo()[2];

        }

  
    




?>