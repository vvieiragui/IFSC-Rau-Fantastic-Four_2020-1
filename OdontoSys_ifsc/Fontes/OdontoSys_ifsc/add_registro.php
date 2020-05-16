<?php
session_start(); 
require_once 'init.php';
 
// pega os dados do formuário

$nome_registro = isset($_POST['nome_registro']) ? $_POST['nome_registro'] : NULL; 
$email_registro = isset($_POST['email_registro']) ? $_POST['email_registro'] : NULL;
$senha = isset($_POST['senha']) ? $_POST['senha'] : NULL;
$id_registro = isset($_POST['id_registro']) ? $_POST['id_registro'] : NULL;
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO registro(nome_registro, email_registro, senha) 
        VALUES(:nome_registro, :email_registro, :senha )";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome_registro', $nome_registro);
$stmt->bindParam(':email_registro', $email_registro);
$stmt->bindParam(':senha', $senha);

if ($stmt->execute())
{
    echo "<script>alert('Registro de login enviado com Sucesso!');</script>";
    echo "<script>javascript:window.location='registrar_login.php';</script>";
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}


