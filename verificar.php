<?php
	//iniciar a sessao
	session_start();

	//variavel na sessao para controlar as tentativas de acesso
	if ( isset ( $_SESSION["tentativas"] ) ){
		//somar mais 1 a tentativa
		$_SESSION["tentativas"]++;
	} else {
		//se nao existir iniciar a variavel
		$_SESSION["tentativas"] = 1;
	}

	//se as tentativas forem > 10 bloqueia
	if ( $_SESSION["tentativas"] > 10000000 ) {
		echo "<p>Você tentou efetuar mais de 10 tentativas. Tente novamente mais tarde!</p>";
		exit;
	}

	//verificar se dados foram postados
	if ($_POST){

		$login = $senha = "";
		//verificar se o login e a senha foram enviados por post
		if ( isset ( $_POST["loginUsuario"] ) )
			$login = trim ( $_POST["loginUsuario"] );
		if ( isset ( $_POST["senha"] ) )
			$senha = trim ( $_POST["senha"] );

		//verificar se esta em branco
		if (empty($login)){
			//mensagem de erro
			echo "<script>alert('Preencha o login');history.back();</script>";
			exit;
		}elseif(empty($senha)) {
			echo "<script>alert('Preencha a senha');history.back();</script>";
			exit;
			
		}else{
			include "app/conecta.php";

			$sql = "select * from usuario
				where login = ? limit 1";
			$consulta = $pdo->prepare($sql);
			//passar parametro login
			$consulta->bindParam(1,$login);
			//executar o sql
			$consulta->execute();
			//recuperar os dados do sql
			$dados = $consulta->fetch(PDO::FETCH_OBJ);


			//se trouxe algum resultado
			if(empty($dados->id)){
				echo "<script>alert('Usuário não encontrado');history.back();</script>";

			}elseif($dados->status != 1){
				echo "<script>alert('Este usuário não está ativo');history.back();</script>";

			}elseif(!password_verify($senha, $dados->senha)){
				echo "<script>alert('Senha incorreta');history.back();</script>";

			}else{
				
				$_SESSION["sistema"] = array(
					"id"=>$dados->id,
					"login"=>$dados->login,
					"nome"=>$dados->nome,
					"login"=>$dados->login
				);

				//mandar para uma tela
				header("Location: home.php");
			}	

		}

	}else {
		//mandar para o formulario
		header("Location: erro.php");
	}