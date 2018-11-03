<?php
	
	include "app/funcoes.php";

	if($_POST){
		if(isset($_POST["id"])){
			$id = trim($_POST["id"]);
		}

		if(isset($_POST["nome"])){
			$nome = trim($_POST["nome"]);
		}

		if(isset($_POST["email"])){
			$email = trim($_POST["email"]);
		}

		if(isset($_POST["senha"])){
			$senha = trim($_POST["senha"]);
		}

		if(isset($_POST["cpf"])){
			$cpf = trim($_POST["cpf"]);

		}

		if(isset($_POST["uf"])){
			$estado = trim($_POST["uf"]);
			if($estado == "Estado"){
				echo "<script>alert('Selecione um estado');history.back();</script>";
			}
		}

		if(isset($_POST["cidade"])){
			$cidade = trim($_POST["cidade"]);
			if($cidade == "Cidade"){
				echo "<script>alert('Selecione uma cidade');history.back();</script>";
			}
		}
		
		if(isset($_POST["cep"])){
			$cep = trim($_POST["cep"]);
		}

		if(isset($_POST["rg"])){
			$rg = trim($_POST["rg"]);
		}

		if(isset($_POST["endereco"])){
			$endereco = trim($_POST["endereco"]);
		}

		if(isset($_POST["telefone"])){
			$telefone = trim($_POST["telefone"]);
		}

		if(empty($nome)){
			echo "<script>alert('Digite o nome');history.back();</script>";
			exit;

		}elseif(empty($id) AND empty($senha)){
			echo "<script>alert('Digite a senha');history.back();</script>";
			exit;

		}elseif(empty($email)){
			echo "<script>alert('Digite o email');history.back();</script>";
			exit;

		}elseif(empty($cpf)){
			echo "<script>alert('Digite o CPF');history.back();</script>";
			exit;

		}elseif(empty($rg)){
			echo "<script>alert('Digite o RG');history.back();</script>";
			exit;

		}elseif(empty($endereco)){
			echo "<script>alert('Digite o endereço');history.back();</script>";
			exit;

		}elseif(empty($telefone)){
			echo "<script>alert('Digite o telefone');history.back();</script>";
			exit;

		}elseif(empty($cep)){
			echo "<script>alert('Digite o CEP');history.back();</script>";
			exit;

		}elseif(empty($cidade)){
			echo "<script>alert('Digite a cidade');history.back();</script>";
			exit;

		}elseif(empty($estado)){
			echo "<script>alert('Digite o estado');history.back();</script>";
			exit;

		}

		include "app/conecta.php"; 

		if(empty($id)){
			$sql = "INSERT INTO usuario (id, nome, senha, status, tipoUsuario, cpf, endereco, telefone, rg, email, cidade, cep, estado) VALUES
			(NULL, :nome, :senha, 1, 3, :cpf, :endereco, :telefone, :rg, :email, :cidade, :cep, :estado)";

			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':senha', $senha);
			$consulta->bindParam(':cpf', $cpf);
			$consulta->bindParam(':endereco', $endereco);
			$consulta->bindParam(':telefone', $telefone);
			$consulta->bindParam(':rg', $rg);
			$consulta->bindParam(':email', $email);
			$consulta->bindParam(':cidade', $cidade);
			$consulta->bindParam(':cep', $cep);
			$consulta->bindParam(':estado', $estado);

		}else{
			$sql = "UPDATE usuario SET nome = :nome, senha = :senha, cpf = :cpf, endereco = :endereco, telefone = :telefone, rg = :rg, email = :email, cidade = :cidade, cep = :cep, estado = :estado WHERE id = :id LIMIT 1";

			$consulta = $pdo->prepare($sql);
			$consulta->bindParam(':nome', $nome);
			$consulta->bindParam(':senha', $senha);
			$consulta->bindParam(':cpf', $cpf);
			$consulta->bindParam(':endereco', $endereco);
			$consulta->bindParam(':telefone', $telefone);
			$consulta->bindParam(':rg', $rg);
			$consulta->bindParam(':email', $email);
			$consulta->bindParam(':cidade', $cidade);
			$consulta->bindParam(':cep', $cep);
			$consulta->bindParam(':estado', $estado);
			$consulta->bindParam(':id', $id);

		}

		if(empty($id)){
			$alert = "Adicionado";
		}else{
			$alert = "Modificado";
		}


		if($consulta->execute()){
			echo "<script>alert('Cliente $alert com sucesso');location.replace('home.php?fd=listas&pg=cliente');</script>";

		}else{
			echo $consulta->errorInfo()[2];
			exit;
			echo "<script>alert('Erro ao inserir/modificar cliente');location.replace('home.php?fd=listas&pg=cliente');</script>";
		}


	}//fim do $_POST


?>