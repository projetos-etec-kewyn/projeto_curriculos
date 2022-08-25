<?php
include 'session.php';
include "conecta.php";

$nome_novo = $_POST['nome'];
$email_novo = $_POST['email'];
$cpf_novo = $_POST['cpf'];
$email_logado = $_SESSION['email_user'];

function pega_id_curr($email_logado){
    include 'conecta.php';
    $sql_2 = "SELECT * FROM curriculo WHERE email='$email_logado'";

    $resultado = mysqli_query($conexao, $sql_2);
    $id_curriculo = "";
    if (mysqli_num_rows($resultado) > 0) {            
        while($linha = mysqli_fetch_assoc($resultado)) {
            $id_curriculo = $linha["id_curr"];                
        }
    }
    else{
        echo "Nenhum dado encontrado!";
    }
    return $id_curriculo;
}
function id_do_usuario($email_logado){
    include 'conecta.php';
    $sql_2 = "SELECT * FROM usuarios WHERE email='$email_logado'";
    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql_2);
    $id_usuario = "";
    if (mysqli_num_rows($resultado) > 0) {            
        while($linha = mysqli_fetch_assoc($resultado)) {
            $id_usuario = $linha["id"];                
        }
    }
    else{
        echo "Nenhum dado encontrado!";
    }
    return $id_usuario;
}

$id_do_curriculo = pega_id_curr($email_logado);
$id_do_usuario = id_do_usuario($email_logado);

function altera_dados($id_do_curriculo,$id_do_usuario,$nome_novo,$email_novo,$cpf_novo){
    include 'conecta.php';
    $altera_usuarios = "UPDATE usuarios SET nome='$nome_novo',email='$email_novo',cpf='$cpf_novo' WHERE id='$id_do_usuario'";
    $altera_curriculo = "UPDATE curriculo SET nome='$nome_novo',email='$email_novo' WHERE id_curr='$id_do_curriculo'";
    if ((mysqli_query($conexao, $altera_usuarios))&&(mysqli_query($conexao, $altera_curriculo))) {
        mysqli_close($conexao);
        ?>
        <script type="text/javascript">
            alert("Dados Alterados. Faça Login novamente!");                
            window.location.href = "logout.php";                
        </script>
        <?php
    } 
    else {
        echo "Erro na atualização do registro: " . mysqli_error($conexao);
        mysqli_close($conexao);
    }
}

altera_dados($id_do_curriculo,$id_do_usuario,$nome_novo,$email_novo,$cpf_novo);


?>