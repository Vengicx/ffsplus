<?php

    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }

    $id = $tela = "";

    if (isset ($_GET["id"])){
        $id = trim ($_GET["id"]);
    }

    if(isset($_GET["tela"])){
        $tela = trim ($_GET["tela"]);

    }else{
        echo "<script>alert('Requisição inválida');history.back();</script>";
        exit;
    }

    $id = (int)$id;

    if ($id == 0) {
    	echo "<script>alert('Requisição inválida');history.back();</script>";
		exit;

    }
    
    if($tela == "usuario"){
        if ($id == $_SESSION["sistema"]["id"]){
            echo "<script>alert('Você está logado com esse usuário no momento');history.back();</script>";
            exit;
        }

        $tabela = "usuario";

    }elseif($tela == "produto"){
        $tabela = "produto";

    }elseif($tela == "tamanho"){
        $tabela = "tamanho";

    }elseif($tela == "estado"){
        $tabela = "estado";

    }elseif($tela == "cidade"){
        $tabela = "cidade";

    }elseif($tela == "materiaprima"){
        $tabela = "materiaprima";
        
    }else{
        echo "<script>alert('Requisição inválida');history.back();</script>";
        exit;
    }

    include "./app/conecta.php";

    $sql = "DELETE FROM $tabela WHERE id = :id LIMIT 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':id', $id);

    if ($consulta->execute()){      
        echo "<script>alert('Registro excluído');history.back();</script>";
		exit;

	} else {
        echo "<script>alert('Erro ao excluir registro');history.back();</script>";
        exit;   

	}