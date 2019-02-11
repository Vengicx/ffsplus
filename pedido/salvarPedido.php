<?php
    $id = $produto_id = $tamanho_id = $usuario_id = $horaPedido = $andamento_id = "";

    if($_POST){
        if(isset($_POST["id"])){
            $id = trim ($_POST["id"]);
        }

        if(isset($_POST["produto_id"])){
            $produto_id = trim ($_POST["produto_id"]);
        }

        if(isset($_POST["usuario_id"])){
            $usuario_id = trim ($_POST["usuario_id"]);
        }

        if(isset($_POST["tamanho_id"])){
            $tamanho_id = trim ($_POST["tamanho_id"]);
        }

        if(empty($produto_id)){
            echo "<scipt>alert('Selecione um produto');history.back();</script>";
            exit;
        }elseif(empty($usuario_id)){
            echo "<scipt>alert('Selecione um cliente ou mesa');history.back();</script>";
            exit;
        }elseif(empty($tamanho_id)){
            echo "<scipt>alert('Selecione o tamanho da pizza');history.back();</script>";
            exit;
        }else{

            include "app/conecta.php";
            
            $pdo->beginTransaction();

            if(isset($id)){
                
                $sql = "INSERT INTO pedido (id, produto_id, tamanho_id, usuario_id) VALUES 
                    (NULL, :produto_id, :tamanho_id, :usuario_id)";

                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(':produto_id', $produto_id);
                $consulta->bindParam(':usuario_id', $usuario_id);
                $consulta->bindParam(':tamanho_id', $tamanho_id);
                $consulta->execute();

                $lastInsert = $pdo->lastInsertId();

                $sql2 = "INSERT INTO pedido_andamento (idAndamento, hora, idPedido) VALUES (1, NOW(), :idPedido)";
                
                $consulta2 = $pdo->prepare($sql2);
                
                $consulta2->bindParam('idPedido', $lastInsert, PDO::PARAM_INT);
                $consulta2->execute();

                $pdo->commit();

            }else{
                //atualizar
            }
            
        }//fim do else
    
    }else{//fim do $_POST
        header("Location: home.php");
        exit;
    }




?>