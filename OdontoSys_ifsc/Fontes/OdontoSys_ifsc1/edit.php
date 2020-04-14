<?php
 
require_once 'init.php';
 
// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$cro = isset($_POST['cro']) ? $_POST['cro'] : null;
$dNasc = isset($_POST['dNasc']) ? $_POST['dNasc'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$uf = isset($_POST['uf']) ? $_POST['uf'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$rua = isset($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$contato1 = isset($_POST['contato1']) ? $_POST['contato1'] : null;
$contato2 = isset($_POST['contato2']) ? $_POST['contato2'] : null;
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : null;
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
 
// validação
if (empty($nome) || empty($cpf) || empty($email))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
//  converter para YYYY-mm-dd
$isoDate = dateConvert($dNasc);
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE usuario SET nome = :nome, cpf = :cpf, cro = :cro, dNasc = :dNasc, email = :email, cep = :cep, uf = :uf, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero, complemento = :complemento, contato1 = :contato1, contato2 = :contato2, observacao = :observacao WHERE id_usuario = :id_usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':cro', $cro);
$stmt->bindParam(':dNasc', $isoDate);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':uf', $uf);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':complemento', $complemento);
$stmt->bindParam(':contato1', $contato1);
$stmt->bindParam(':contato2', $contato2);
$stmt->bindParam(':observacao', $observacao);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: prontuario.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>