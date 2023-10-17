<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = 3306;

try{
    //conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname" . $dbname; $user, $pass);
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    
    //conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname" . $dbname, $user, $pass);

    //echo "conexão com o banco de dados realizado com sucesso!";
} catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizado. Erro gerado ". $err->getMessage();
}