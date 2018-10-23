<?php
	if ( !isset ( $page ) ) {
		echo "Acesso negado";
		exit;
	}

	$id = $nome = $qtdPedacos = $qtdSabores = "";

	if($_POST){
		
		if(isset($_POST["id"])){
			$id = trim ($_POST["id"]);
		}

		if(isset($_POST["nome"])){
			$nome = trim ($_POST["nome"]);
		}

		if(isset($_POST["qtdPedacos"])){
			$qtdPedacos = trim ($_POST["qtdPedacos"]);
		}

		if(isset($_POST["qtdSabores"])){
			$qtdSabores = trim ($_POST["qtdSabores"]);
		}
		
		if(empty($nome)){
			echo "<script>alert('Preencha o nome do tamanho');history.back();</script>";
			exit;
		}elseif(empty($qtdPedacos)){
			echo "<script>alert('Preencha a quantidade máxima de pedaços');history.back();</script>";
			exit;
		}elseif(empty($qtdSabores)){
			echo "<script>alert('Preencha a quantidade máxima de sabores');history.back();</script>";
			exit;
		}

		include "./app/conecta.php";

		if(empty($id)){
			$sql = "INSERT INTO tamanho (nome, qtdPedacos, qtdSabores) VALUES (:nome, :qtdPedacos, :qtdSabores)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':qtdPedacos', $qtdPedacos);
			$consulta->bindParam(':qtdSabores', $qtdSabores);

		}else{
			$sql = "UPDATE tamanho SET nome = :nome, qtdPedacos = :qtdPedacos, qtdSabores = :qtdSabores WHERE id = :id LIMIT 1";
			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':qtdPedacos', $qtdPedacos);
			$consulta->bindParam(':qtdSabores', $qtdSabores);
			$consulta->bindParam(':id', $id);
		}

		if(empty($id)){
			$alert = "Adicionado";
		}else{
			$alert = "Modificado"
		}

		if($consulta->execute()){
			echo "<script>alert('Tamanho $alert com sucesso!');location.replace('home.php?fd=listas&pg=tamanho')</script>";
			exit;

		}else{
			echo $consulta->errorInfo()[2];
			exit;
		
		}
	
	}else{
		header("Location: home.php");
	}