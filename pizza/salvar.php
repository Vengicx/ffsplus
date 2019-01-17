<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }
	
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

	
	var_dump($codigo);

	

