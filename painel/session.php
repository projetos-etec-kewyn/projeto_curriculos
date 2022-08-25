<?php
    session_start();
    if((!isset($_SESSION['id_user']) == true) and (!isset($_SESSION['nome_user']) == true) and (!isset($_SESSION['tipo_user']) == true)){
        unset($_SESSION['id_user']);
        unset($_SESSION['nome_user']);
        unset($_SESSION['tipo_user']);
        unset($_SESSION['cpf_user']); 
        unset($_SESSION['email_user']);
        header('Location: login.php'); 
    }  
    ?>