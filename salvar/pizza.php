<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];

	}

	if(empty($_POST["id"])){
		echo"<script>alert('Selecione ao menos uma matéria prima');history.back();</script>";
		exit;
	}

	$codigo = array();

    foreach ($id as $values){

    	$codigo[] = $values; 

	}    

	include "./app/conecta.php";
	
	$pdo->beginTransaction();
	
	$sql = 'INSERT INTO materiaprima_produto (memberID, programID) VALUES ';
	$insertQuery = array();
	$insertData = array();
	foreach ($data as $row) {
	    $insertQuery[] = '(?, ?)';
	    $insertData[] = $memberid;
	    $insertData[] = $row;
	}

	if (!empty($insertQuery)) {
	    $sql .= implode(', ', $insertQuery);
	    $stmt = $db->prepare($sql);
	    $stmt->execute($insertData);
	}

	$pdo->commit();

