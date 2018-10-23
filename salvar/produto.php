<?php
	$id = $nome = $precoCompra = $precoVenda = $quantidade = "";
	
	$tipoProduto = 2;

	if($_POST){	
		if(isset($_POST["id"])){
			$id = trim ($_POST["id"]);
		}

		if(isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);
		}

		if(isset($_POST["precoCompra"])){
			$precoCompra = trim ($_POST["precoCompra"]);
			$precoCompra = str_replace(",", ".", $precoCompra);
		}

		if(isset($_POST["precoVenda"])){
			$precoVenda = trim ($_POST["precoVenda"]);
			$precoVenda = str_replace(",", ".", $precoVenda);
		}

		if(isset($_POST["quantidade"])){
			$quantidade = trim ($_POST["quantidade"]);
			if($quantidade <= 0){
				echo "<script>alert('Impossivel cadastrar estoque negativo');history.back();</script>";
				exit;
			}
		}

		include "./app/conecta.php";

		if(isset($id) and isset($quantidade) and !isset($_POST["nome"])){
			$pdo->beginTransaction();

			$sql = "UPDATE produto SET quantidade = quantidade + :quantidade WHERE id = :id LIMIT 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':quantidade', $quantidade);
			$consulta->bindParam(':id', $id);

			if($consulta->execute()){
				echo "<script>alert('Quantidade adicionada com sucesso');location.replace('home.php?fd=listas&pg=produto');</script>";
				$pdo->commit();
				exit;
			}else{
				echo "<script>alert('Erro ao adicionar quantidade');location.replace('home.php?fd=listas&pg=produto');</script>";
				$pdo->rollBack();	
				exit;
			}
		}

		if(empty($nome)){
			echo "<script>alert('Preencha o nome');history.back();</script>";
			exit;

		}elseif(empty($precoCompra)){
			echo "<script>alert('Preencha o preço de compra');history.back();</script>";
			exit;

		}elseif(empty($precoVenda)){
			echo "<script>alert('Preencha o preço de venda');history.back();</script>";
			exit;

		}

		if(empty($id)){
			$sql = "INSERT INTO produto (id, nome, precoCompra, precoVenda, quantidade, tipoProduto) VALUES (NULL, :nome, :precoCompra, :precoVenda, :quantidade, :tipoProduto)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':precoCompra', $precoCompra);
			$consulta->bindParam(':precoVenda', $precoVenda);
			$consulta->bindParam(':quantidade', $quantidade);
			$consulta->bindParam(':tipoProduto', $tipoProduto);

		}else{//fim do empty id
			$sql = "UPDATE produto SET nome = :nome, precoCompra = :precoCompra, precoVenda = :precoVenda WHERE id = :id";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':precoCompra', $precoCompra);
			$consulta->bindParam(':precoVenda', $precoVenda);
			$consulta->bindParam(':id', $id);

		}//fim do else do empty id
		
		if(empty($id)){
			$alert = "Adicionado";
		}else{
			$alert = "Modificado"
		}

		if($consulta->execute()){
			echo "<script>alert('Produto $alert com sucesso');
					location.replace('home.php?fd=listas&pg=produto');
				  </script>";

		}else{
			echo "<script>alert('Erro ao inserir/modificar produto');history.back();</script>";
			exit;

		}
	}//fim do $_POST

	