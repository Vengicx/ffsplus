<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
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
			
			$precoCompra = str_replace(",",".", $precoCompra);
    	}

    	if(isset($_POST["precoUnidade"])){
    		$precoUnidade = trim ($_POST["precoUnidade"]);
    	}

    	if(isset($_POST["idtipomateria"])){
    		$idtipomateria = trim ($_POST["idtipomateria"]);
    	}

    	if(isset($_POST["quantidade"])){
    		$quantidade = trim ($_POST["quantidade"]);
    		
    		if($quantidade <= 0){
    			echo "<script>alert('Impossível adicionar estoque negativo');location.href='home.php?fd=materiaprima&pg=listar';</script>";
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
				echo "<script>alert('Quantidade adicionada com sucesso');location.replace('home.php?fd=materiaprima&pg=listar');</script>";
				$pdo->commit();
				exit;
				
			}else{
				echo "<script>alert('Erro ao adicionar quantidade');location.replace('home.php?fd=materiaprima&pg=listar');</script>";
				$pdo->rollBack();	
				exit;

			}
		}

		$precoUnidade = 1;

    	if(empty($id)){
    		$sql = "INSERT INTO materiaprima (id, nome, precoCompra, precoUnidade, idtipomateria, quantidade) VALUES 
    		(NULL, :nome, :precoCompra, :precoUnidade, :idtipomateria, :quantidade)";

    		$consulta = $pdo->prepare($sql);

    		$consulta->bindParam(':nome', $nome);
    		$consulta->bindParam(':precoCompra', $precoCompra);
    		$consulta->bindParam(':precoUnidade', $precoUnidade);
    		$consulta->bindParam(':idtipomateria', $idtipomateria);
    		$consulta->bindParam(':quantidade', $quantidade);

    	}else{
    		$sql = "UPDATE materiaprima SET nome = :nome, precoCompra = :precoCompra, precoUnidade = :precoUnidade, idtipomateria = :idtipomateria, quantidade = :quantidade WHERE id = :id";

    		$consulta = $pdo->prepare($sql);

    		$consulta->bindParam(':nome', $nome);
    		$consulta->bindParam(':precoCompra', $precoCompra);
    		$consulta->bindParam(':precoUnidade', $precoUnidade);
    		$consulta->bindParam(':idtipomateria', $idtipomateria);
    		$consulta->bindParam(':quantidade', $quantidade);
    		$consulta->bindParam(':id', $id);

    	}

    	if(empty($id)){
			$alert = "Adicionada";

		}else{
			$alert = "Modificada";

		}

    	if($consulta->execute()){
			echo "<script>alert('Matéria-Prima $alert com sucesso');location.replace('home.php?fd=materiaprima&pg=listar');</script>";
			exit;

    	}else{
    		echo $consulta->errorInfo()[2];
			exit;
			
    	}

    }else{
    	header("Location: home.php");
    }

?>
