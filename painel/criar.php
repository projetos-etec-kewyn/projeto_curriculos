<?php
include 'conecta.php';
 
$nome = $_POST['nome'];
$email = $conexao->real_escape_string(strtolower($_POST['email'])); 
$tipo = $_POST['tipo'];
$cpf = $_POST['cpf'];
$senha = md5($conexao->real_escape_string($_POST['senha']));
$senha2 = md5($conexao->real_escape_string($_POST['senha2']));

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo, cpf) VALUES ('$nome','$email','$senha','$tipo','$cpf')";

    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    header("Location: login.php");
?> 