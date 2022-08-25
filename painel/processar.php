<?php
include 'session.php';
include 'conecta.php';
 
$sql = "SELECT * FROM curriculo";
$resultado = mysqli_query($conexao,$sql);
while($chave = mysqli_fetch_assoc($resultado)){
    $dado = $chave['id_curr'];
}
$tipo_cad = $_SESSION['tipo_cad'];

switch($tipo_cad){ 
    case 'com':
        $comp = $_POST['comp'];
        $sql = "INSERT INTO competencias (competencia, id_curr) VALUES ('$comp','$dado')";
        break;

    case 'hab':
        $habi = $_POST['habi'];
        $sql = "INSERT INTO habilidades (habilidade, id_curr) VALUES ('$habi','$dado')";      
        break;
 
    case 'edu':
        $inicio = $_POST['inicio'];
        $fim = $_POST['fim'];
        $curso = $_POST['curso'];
        $inst = $_POST['inst'];
        $sql = "INSERT INTO educacao (inicio, fim, curso, instituicao, id_curr) VALUES ('$inicio','$fim','$curso','$inst','$dado')";
        break;

    case 'exp':
        $inicio = $_POST['inicio'];
        $fim = $_POST['fim'];
        $ocup = $_POST['ocup'];
        $empr = $_POST['empr'];
        $sql = "INSERT INTO experiencia (inicio, fim, ocupacao, empresa, id_curr) VALUES ('$inicio','$fim','$ocup','$empr','$dado')";
        break;
    }

    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    header("Location: index.php");
?>  