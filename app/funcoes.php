<?php 
	function limitarTexto($texto, $limite){
		$contador = strlen($texto);
	  		if ( $contador >= $limite ) {      
				$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
			     return $texto;

	  		}else{
	    		return $texto;

	  	}
	}//fim da funcao

	function getMateria($id, $quantidade){

		$id = $_POST["codigo"];

    	foreach ($codigo as $values){

	    	echo $values;
	    	echo "<br>";

    }


	}









?>