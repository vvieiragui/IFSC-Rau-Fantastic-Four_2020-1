<?php
session_start(); 
require_once 'init.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$cro = isset($_POST['cro']) ? $_POST['cro'] : null;
$data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$uf = isset($_POST['uf']) ? $_POST['uf'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$rua = isset($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

// a data vem no formato dd/mm/YYYY
//converter para YYYY-mm-dd
$isoDate = dateConvert($data_nascimento);
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO usuario(nome, cpf, cro, data_nascimento, cep, uf, cidade, bairro, rua, numero, complemento, telefone, email, observacao) 
        VALUES(:nome, :cpf, :cro, :data_nascimento, :cep, :uf, :cidade, :bairro, :rua, :numero, :complemento, :telefone, :email, :observacao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':cro', $cro);
$stmt->bindParam(':data_nascimento', $isoDate);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':uf', $uf);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':complemento', $complemento);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':observacao', $observacao);

if ($stmt->execute())
{
    header('Location: usuarioscadastrados.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}