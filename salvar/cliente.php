<?php
	
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
		if(isset($_POST["cep")]){
			$cep = trim($_POST["cep"]);
		}
		if(isset($_POST["rg"])){
			$rg = trim($_POST["rg"]);
		}



	}//fim do $_POST

?>