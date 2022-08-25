<?php
include 'conecta.php';
include 'session.php';

$cad = $_SESSION['cad'];



$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$curso = $_POST['curso'];

if($cad){
    $sql = "UPDATE curriculo SET nome = '$nome', telefone = '$telefone', email = '$email', curso = '$curso' WHERE id_curr = 1";
}else{
    $sql = "INSERT INTO curriculo (nome,telefone,email,curso) VALUES ('$nome','$telefone','$email','$curso')";
}


mysqli_query($conexao,$sql);
mysqli_close($conexao);

$_SESSION['cad'] = true;
header('Location: index.php');


?>