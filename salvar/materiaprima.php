<?php
    if (!isset($page)){
        echo "Acesso negado";
        exit;
    }

    if($_POST){
    	if(isset($_POST["id"])){
    		$id = trim ($_POST["id"]);
    	}

    	if(isset($_POST["nome"])){
    		$nome = trim ($_POST["nome"]);
    	}

    	if(isset($_POST["precoCompra"])){
    		$precoCompra = trim ($_POST["precoCompra"]);
    	}

    	if(isset($_POST["precoUnidade"])){
    		$precoUnidade = trim ($_POST["precoUnidade"]);
    	}

    	if(isset($_POST["qtdPedacos"])){
    		$qtdPedacos = trim ($_POST["qtdPedacos"]);
    	}

    	if(isset($_POST["quantidade"])){
    		$quantidade = trim ($_POST["quantidade"]);
    		
    		if($quantidade <= 0){
    			echo "<script>alert('Impossível adicionar estoque negativo');history.back();</script>";
    			exit;
    		}
    	}

    	include "app/conecta.php";

    	if(isset($id) and isset($quantidade) and !isset($_POST["nome"])){
			$pdo->beginTransaction();

			$sql = "UPDATE materiaprima SET quantidade = quantidade + :quantidade WHERE id = :id LIMIT 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':quantidade', $quantidade);
			$consulta->bindParam(':id', $id);

			if($consulta->execute()){
				echo "<script>alert('Quantidade adicionada com sucesso');location.replace('home.php?fd=listas&pg=materiaprima');</script>";
				$pdo->commit();
				exit;
				
			}else{
				echo "<script>alert('Erro ao adicionar quantidade');location.replace('home.php?fd=listas&pg=materiaprima');</script>";
				$pdo->rollBack();	
				exit;

			}
		}

		if(empty($nome)){
            echo "<script>alert('Digite o nome da matéria prima');history.back();</script>";
            exit;

        }elseif(empty($precoCompra)){
            echo "<script>alert('Digite o preço de compra');history.back();</script>";
            exit;
        }elseif(empty($precoUnidade)){
            echo "<script>alert('O preço da unidade não foi calculado');history.back();</script>";
            exit;
        }elseif(empty($qtdPedacos)){
            echo "<script>alert('Digite a quantidade dividida da matéria');history.back();</script>";
            exit;
        }

    	if(empty($id)){
    		$sql = "INSERT INTO materiaprima (id, nome, precoCompra, precoUnidade, qtdPedacos, quantidade) VALUES 
    		(NULL, :nome, :precoCompra, :precoUnidade, :qtdPedacos, :quantidade)";

    		$consulta = $pdo->prepare($sql);

    		$consulta->bindParam(':nome', $nome);
    		$consulta->bindParam(':precoCompra', $precoCompra);
    		$consulta->bindParam(':precoUnidade', $precoUnidade);
    		$consulta->bindParam(':qtdPedacos', $qtdPedacos);
    		$consulta->bindParam(':quantidade', $quantidade);

    	}else{
    		$sql = "UPDATE materiaprima SET nome = :nome, precoCompra = :precoCompra, precoUnidade = :precoUnidade, qtdPedacos = :qtdPedacos, quantidade = :quantidade WHERE id = :id";

    		$consulta = $pdo->prepare($sql);

    		$consulta->bindParam(':nome', $nome);
    		$consulta->bindParam(':precoCompra', $precoCompra);
    		$consulta->bindParam(':precoUnidade', $precoUnidade);
    		$consulta->bindParam(':qtdPedacos', $qtdPedacos);
    		$consulta->bindParam(':quantidade', $quantidade);
    		$consulta->bindParam(':id', $id);

    	}

    	if(empty($id)){
			$alert = "Adicionada";

		}else{
			$alert = "Modificada";

		}

    	if($consulta->execute()){
    		echo "<script>alert('Matéria-Prima $alert com sucesso');location.replace('home.php?fd=listas&pg=materiaprima');</script>";

    	}else{
    		echo $consulta->errorInfo()[2];
			exit;
			
    	}

    }else{
    	header("Location: home.php");
    }

?>
