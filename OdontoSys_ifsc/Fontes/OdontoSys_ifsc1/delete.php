<?php
 
require_once 'init.php';
 
// pega o ID da URL
$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
 
// valida o ID
if (empty($id_usuario))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: prontuario.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>