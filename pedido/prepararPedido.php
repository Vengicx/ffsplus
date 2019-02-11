<?php
	include "./app/conecta.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];

    }

	$consulta = $pdo->prepare("SELECT 
								an.id AS id_andamento, 
								pe.id AS id_pedido 
								FROM pedido_andamento p_a 
								INNER JOIN andamento an ON an.id = p_a.idAndamento
								INNER JOIN pedido pe ON pe.id = p_a.idPedido
								WHERE pe.id = ?");
	$consulta->bindParam(1, $id);
	$consulta->execute();
	$dados = $consulta->fetch(PDO::FETCH_OBJ);
	
	if($dados->id_andamento == '2'){
		$consulta = $pdo->prepare("UPDATE pedido_andamento SET idAndamento = 3 WHERE idPedido = ?");
		$consulta->bindParam(1, $id);

		if($consulta->execute()){
			echo "<script>alert('Pedido atualizado para Pronto');history.back();</script>";
            exit;

		}else{
			echo "<script>alert('Erro ao finalizar pedido');history.back();</script>";
			exit;
        }
        
	}else{
		$consulta = $pdo->prepare("UPDATE pedido_andamento SET idAndamento = 2 WHERE idPedido = ?");
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