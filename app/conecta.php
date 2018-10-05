<?php
    $localhost = "127.0.0.1";
    $database = "testetcc";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$localhost;dbname=$database;charset=utf8",$user,$password);
    } catch (PDOException $erro){
        echo $erro->getMessage();
        exit;
    }
