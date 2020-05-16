<?php 
    $servidor = "localhost";
    $user = "root";
    $passw = "";
    $dbname = "odontosys";

    global $conn;

    try {
    $conn = new PDO("mysql:dbname=".$dbname."; host=".$servidor, $user, $passw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo 'ERRO: '.$e->getMessage();
        exit;
    }

    /*
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $conn->query("SELECT * FROM 'USUARIO' WHERE 'email' = '$login' AND 'senha' = '$senha'");
    $sql->execute();

    echo $sql->rowCount();
    */
    ?>