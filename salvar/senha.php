<?php
    if(!isset($_SESSION["sistema"]["id"])){
            header("location: ./index.php");
            
    }
    
    require_once "./app/conecta.php";
    
    #post from ./cadastro/alterarSenha.php
    if(isset ($_POST["senha"]))
    $senha = trim ($_POST["senha"]);
    
    if(isset ($_POST["senhaNova"]))
    $senhaNova = trim ($_POST["senhaNova"]);

    if(isset ($_POST["senhaConfirma"]))
    $senhaConfirma = trim ($_POST["senhaConfirma"]);
    #fim do post

    $usuarioLogado = $_SESSION["sistema"]["login"]; //pegar o dado 'login' que está logado em 'sistema'

    $consulta = $pdo->prepare("SELECT senha FROM usuario WHERE login = :login");
    $consulta->bindParam(':login', $usuarioLogado);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if($senhaConfirma != $senhaNova){
        echo "<script>alert('As senhas não coincidem.');history.back();</script>";
        exit;

    }elseif($senhaConfirma != (password_verify($senhaOld, $dados->senha))){
        echo "<script>alert('Senha atual incorreta.');history.back();</script>";
        exit;

    }else {
        $senhaNova = password_hash($senhaNova, PASSWORD_DEFAULT);

        $consulta2 = $pdo->prepare("UPDATE usuario SET senha = :senha WHERE login = '$usuarioLogado' LIMIT 1");
        $consulta2->bindParam(':senha', $senhaNova, PDO::PARAM_STR);

        if($consulta2->execute()){
            echo "<script>alert('Senha alterada com sucesso!.');</script>";
            header("Location: home.php");

        }else{
            echo "<script>alert('Erro ao alterar sua senha.');history.back();</script>";
            echo $consulta2->errorInfo()[2];
            exit;
        }
    }
?>