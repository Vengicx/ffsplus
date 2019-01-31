<?php
    if(isset($_POST["id"])){
        $id = trim ($_POST["id"]);

        if(isset($_POST["cadeado"])){
            $cadeado = trim ($_POST["cadeado"]);

        }

        if($cadeado == "lock"){
            $sql = "UPDATE produto SET ativo = 0 WHERE id = ?";
            $alert = "Pizza inativada com sucesso";

        }else{
            $sql = "UPDATE produto SET ativo = 1 WHERE id = ?";
            $alert = "Pizza ativada com sucesso";
        }

        include_once "app/conecta.php";

        $update = $pdo->prepare($sql);
        $update->bindParam(1, $id);

        if($update->execute()){
            echo"<script>alert('$alert');history.back();</script>";
            exit;
        }

    }else{
        echo"<script>alert('Requisição inválida');history.back();</script>";
        exit;
    }


