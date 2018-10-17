<?php
	if ( !isset ( $page ) ) {
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

		if(isset($_POST["login"])){
			$login = trim ($_POST["login"]);
		}

		if(isset($_POST["senha"])){
			$senha = trim ($_POST["senha"]);
		}

		if(isset($_POST["email"])){
			$email = trim ($_POST["email"]);
		}

		if(isset($_POST["tipoUsuario"])){
			$tipoUsuario = trim ($_POST["tipoUsuario"]);
		}

		if(isset($_POST["status"])){
			$status = trim ($_POST["status"]);
		}
		
		$senha = password_hash($senha, PASSWORD_DEFAULT);
		
		include "./app/conecta.php";

		if(empty($nome)){
			echo "<script>alert('Preencha o nome');history.back();</script>";
			exit;
		}elseif(empty($login)){
			echo "<script>alert('Preencha o login');history.back();</script>";
			exit;
		}elseif(empty($senha) and (!empty($id))){
			echo "<script>alert('Preencha a senha');history.back();</script>";
			exit;
		}elseif(empty($email)){
			echo "<script>alert('Preencha o email');history.back();</script>";
			exit;
		}elseif(empty($status)){
			echo "<script>alert('Preencha se é ativo ou não');history.back();</script>";
			exit;
		}elseif(empty($tipoUsuario)){
			echo "<script>alert('Preencha o tipo de usuário');history.back();</script>";
			exit;
		}

		include "./app/conecta.php";
		
		if(empty($id)){
			$sql = "insert into usuario (nome, login, senha, email, ativo, tipoUsuario) values (?, ?, ?, ?, ?, ?)";
			$query = $pdo->prepare($sql);
			$query->bindParam(1, $nome);
			$query->bindParam(2, $login);
			$query->bindParam(3, $senha);
			$query->bindParam(4, $email);
			$query->bindParam(5, $status);
			$query->bindParam(6, $tipoUsuario);

			if($query->execute()){
				echo "<script>alert('Usuário cadastrado com sucesso');
							  location.replace('home.php?fd=lists&pg=usuario');
					  </script>";
				

			}else{
				echo "<script>alert('Erro ao cadastrar usuário');history.back();</script>";
				exit;
			}

		}else{
			$sql = "update usuario set nome = :nome, senha = :senha, email = :email, status = :status, tipoUsuario = :tipoUsuario where id = :id limit 1";
			$query = $pdo->prepare($sql);
			$query->bindParam(':nome', $nome);
			$query->bindParam(':senha', $senha);
			$query->bindParam(':email', $email);
			$query->bindParam(':status', $status);
			$query->bindParam(':tipoUsuario', $tipoUsuario);
			$query->bindParam(':id', $id);

			if($query->execute()){
				echo "<script>alert('Usuário modificado com sucesso');
							  location.replace('home.php?fd=lists&pg=usuario');
					  </script>";
			}else{
				echo "<script>alert('Erro ao modificar usuário');history.back();</script>";
				exit;
			}

		}
	}else{
		header("Location: home.php");
	}