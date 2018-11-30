<?php
	include "./app/conecta.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];

    }

	$consulta = $pdo->prepare("SELECT * FROM pedido where id = ?");
	$consulta->bindParam(1, $id);
	$consulta->execute();
	$dados = $consulta->fetch(PDO::FETCH_OBJ);
	
	if($dados->andamento_id == '2'){
		$consulta = $pdo->prepare("UPDATE pedido set andamento_id = '3' where id = ?");
		$consulta->bindParam(1, $id);

		if($consulta->execute()){
			echo "<script>alert('Pedido atualizado para Pronto');history.back();</script>";
            exit;

		}else{
			echo "<script>alert('Erro ao finalizar pedido');history.back();</script>";
			exit;
        }
        
	}else{
		$consulta = $pdo->prepare("UPDATE pedido set andamento_id = '2' where id = ?");
		$consulta->bindParam(1, $id);

		if($consulta->execute()){
			echo "<script>alert('Pedido atualizado para Preparando');history.back();</script>";
			exit;

		}else{
			echo "<script>alert('Erro ao preparar pedido');history.back();</script>";
			exit;
		}
	}
?>