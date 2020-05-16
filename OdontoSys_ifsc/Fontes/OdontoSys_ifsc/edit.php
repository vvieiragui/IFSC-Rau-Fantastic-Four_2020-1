<?php
session_start();
require_once 'init.php';
 
// resgata os valores do formulário
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
//  converter para YYYY-mm-dd
$isoDate = dateConvert($data_nascimento);
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE usuario SET nome = :nome, cpf = :cpf, cro = :cro, data_nascimento = :data_nascimento, cep = :cep, uf = :uf, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero, complemento = :complemento, telefone = :telefone, email = :email, observacao = :observacao WHERE id = :id";
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
 
// validação
if (empty($nome) || empty($cpf) || empty($email) || empty($telefone))
{
    echo "<script>alert('Preencha todos os campos!');</script>";
    echo "<script>javascript:window.location='cadastrodentistaedit.php';</script>";
}
 
if ($stmt->execute())
{
    header('Location: usuarioscadastrados.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>