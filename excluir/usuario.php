<?php

    if (!isset ($page)){
        echo "acesso negado";
        exit;
    }

    $id = "";

    if (isset ($_GET["id"])){
        $id = trim ($_GET["id"]);
    }

    $id = (int)$id;

    if ($id == 0) {
    	echo "<script>alert('Requisição inválida');history.back();</script>";
		exit;

	}

    if ($id == $_SESSION["sistema"]["id"]){
    	echo "<script>alert('Você está logado com esse usuário no momento');history.back();</script>";
    	exit;
        
    }

    include "./app/conecta.php";

    $sql = "delete from usuario where id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);

    if ($consulta->execute()){      
        echo "<script>alert('Registro excluído');history.back();</script>";
		exit;

	} else {
		echo "<script>alert('Erro ao excluir registro');history.back();</script>";
		exit;

	}