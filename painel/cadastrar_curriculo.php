<?php
    include 'session.php';
    include 'conecta.php';
    $nom = $_SESSION['nome_user'];
    $ema = $_SESSION['email_user'];
    $cpf = $_SESSION['cpf_user'];
?>

<!DOCTYPE html>
<html lang="pt-br"> 

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/mascara.min.js"></script>

    <title>Cadastrar Currículo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template--> 
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
</head> 

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar seu currículo</h1>
                            </div>
                            <form class="user" action="cad_2.php" method="POST">
                                <h1>Dados Pessoais</h1>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nome Completo" name="nome" readonly <?php echo "value = '$nom'"?>>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" name="email" readonly <?php echo "value = '$ema'"?>>
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="cpf"
                                            id="exampleFirstName" placeholder="CPF" title=""
                                            readonly <?php echo "value = '$cpf'"?>>
                                </div>
                                <div class="form-group">
                                    <input type="fone" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Telefone: Digite somente números" name="telefone"
                                        onkeyup="mascara('(##)# ####-####',this,event,true)" 
                                        maxlength="15">
                                </div>
                                <label for="standard-select">
                                    <div class="select">
                                        <select name="curso" id="standard-select" required>
                                            <option value="">Curso</option>
                                            <option value="Informática">Informática</option>
                                            <option value="Recursos Humanos">Recursos Humanos</option>
                                            <option value="Logística">Logística</option>
                                            <option value="Ensino Médio">Ensino Médio</option>
                                        </select>
                                    </div>
                                </label>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar Conta
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>