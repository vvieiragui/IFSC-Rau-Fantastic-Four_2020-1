<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Pesquisar</title>		
	</head>
	<body>
		<a href="cadastrodentista.php">Cadastrar</a><br>
		<a href="usuarioscadastrados.php">Listar</a><br>
		
		<h1>Pesquisar Usuário</h1>
		
		<form method="POST" action="">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome"><br><br>
			
			<input name="search" type="submit" value="Pesquisar">
		</form><br><br>
		
		<?php
		$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
		if($search){
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM usuario WHERE nome LIKE '%$nome%'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "Nome: " . $row_usuario['nome'] . "<br>";
				echo "E-mail: " . $row_usuario['email'] . "<br>";
				echo "<a href='cadastrodestistaedit.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
				echo "<a href='delete.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
			}
		}
		?>
	</body>
</html>