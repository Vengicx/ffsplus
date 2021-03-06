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

	function formMateria($str){/* para poder fazer o array vai ter que passar o id junto com o nome */ 
	
		$letters = split( '[0-9]', $str );
		
		return array(
					'id'   => str_replace( $letters, '', $str ),
					'nome' => join( '', $letters )
		);
	
	}

	function validaCPF($cpf) {
		// Verifica se um número foi informado
		if(empty($cpf)) {
			return false;
			
		}

		include_once "app/conecta.php";
		
		$sql2 = "SELECT id FROM usuario WHERE cpf = ?";
		$consulta2 = $pdo->prepare($sql2);
		$consulta2->bindParam(1, $cpf);
		$consulta2->execute();
		$dados2 = $consulta2->fetch(PDO::FETCH_OBJ);
		
		if(isset($dados2->id)){
			echo "<script>alert('O CPF $cpf já está cadastrado no sistema');history.back();</script>";
			exit;
		}

		// Elimina possivel mascara
		$cpf = preg_replace("/[^0-9]/", "", $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		
		// Verifica se o numero de digitos informados é igual a 11 
		if (strlen($cpf) != 11) {
			return false;
		}
		// Verifica se nenhuma das sequências invalidas abaixo 
		// foi digitada. Caso afirmativo, retorna falso
		else if ($cpf == '00000000000' || 
			$cpf == '11111111111' || 
			$cpf == '22222222222' || 
			$cpf == '33333333333' || 
			$cpf == '44444444444' || 
			$cpf == '55555555555' || 
			$cpf == '66666666666' || 
			$cpf == '77777777777' || 
			$cpf == '88888888888' || 
			$cpf == '99999999999') {
			return false;
		// Calcula os digitos verificadores para verificar se o
		// CPF é válido
		} else {   
			
			for ($t = 9; $t < 11; $t++) {
				
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return false;
				}
			}

			return true;
		}
	}  

?>