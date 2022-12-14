<?php
    include 'session.php';
    include 'conecta.php';

    if($_SESSION['tipo_user'] == 1){ 
        $tipo = 'Administrador';
    }elseif($_SESSION['tipo_user'] == 2){
        $tipo = 'Aluno';
    }else{
        $tipo = 'Empresa';
    }
    $cpf = $_SESSION['cpf_user'];
    
    include 'botoes.php';    
?> 



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrativo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Banco de Currículos</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Empresas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vagas:</h6>
                        <a class="collapse-item" href="#">Abertas</a>
                        <a class="collapse-item" href="#">Fechadas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Meu Currículo</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acesso Rápido:</h6>
                        <?php
                        if($cad == false){
                            ?>
                        <a class="collapse-item" href="cadastrar_curriculo.php">Cadastrar</a>
                        <?php
                        }else{
                            ?>
                        <a class="collapse-item" href="ver_curriculo.php">Ver Currículo</a>
                        <a class="collapse-item" href="#hab">Habilidades</a>
                        <a class="collapse-item" href="#com">Competências</a>
                        <a class="collapse-item" href="#edu">Educação</a>
                        <a class="collapse-item" href="#exp">Experiência</a>
                        <?php
                        }
                        ?>
                        <a class="collapse-item" href="dados_pessoais.php">Dados Pessoais</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Candidaturas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Processos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="#">Em Andamento</a>                        
                        <div class="collapse-divider"></div>                        
                        <a class="collapse-item" href="#">Encerrados</a>                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bem vindo <b><?php echo $_SESSION['nome_user']; ?></b></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="dados_pessoais.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <?php echo "<p>Logado como $tipo</p>"; ?>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Vagas Recentes</h1>                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Empresa 1</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Empresa 2</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Empresa 3</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Empresa 4</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">INSCREVER-SE</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                     </div>
                     <?php
                     include "botao_cad.php";
                     ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Dados Pessoais</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>Curso</th>
                                                <?php
                                                if($cad){
                                                    ?>
                                                    <th>CPF</th>
                                                    <?php
                                                }
                                                ?>                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                        $sql = "SELECT * FROM curriculo";
                                        
                                        $resultado = mysqli_query($conexao,$sql);

                                        if(mysqli_num_rows($resultado)>0){
                                            while($linha = mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <td><?php echo $linha['id_curr'] ?></td>
                                                <td><?php echo $linha['nome'] ?></td>
                                                <td><?php echo $linha['email'] ?></td>
                                                <td><?php echo $linha['telefone'] ?></td>
                                                <td><?php echo $linha['curso'] ?></td>
                                                <?php
                                                if($cad){
                                                    ?>
                                                    <th><?php echo "$cpf"?></th>
                                                    <?php
                                                }
                                                ?>  
                                            </tr>

                                        <?php
                                            }
                                        }else {
                                            echo "0 resultados encontrados";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            if($cad == false){
                                ?>
                                <p class='aviso'>Você ainda não cadastrou seu currículo!</p>
                                <?php
                            }
                            ?>
                        </div>

                        <?php
                        if($cad){                               
                            $sql = 'SELECT * FROM habilidades';
                            
                            $resultado = mysqli_query($conexao,$sql);

                            if(mysqli_num_rows($resultado)==0){
                                ?>
                            <a href="cadastrar_habilidades.php" class="btn btn-secondary btn-icon-split" id="hab">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Cadastrar Habilidades</span>
                            </a>                                
                            <p class="aviso">Você ainda não cadastrou nenhuma habilidade!</p>

                            <?php
                            }else{
                                ?>
                                <a href="cadastrar_habilidades.php" class="btn btn-secondary btn-icon-split" id="hab">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Cadastrar outra habilidade</span>
                                </a>
                                <?php
                            }
                            ?>
                        <div class="my-2"></div>
                        <div class='card shadow mb-4'>
                            <div class='card-header py-3'>
                                <h6 class='m-0 font-weight-bold text-primary'>Habilidades</h6>
                            </div>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th>ID_Hab</th>
                                                <th>Habilidade</th>
                                                <th>ID_Curr</th>                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php                                
                                        $sql = 'SELECT * FROM habilidades';
                                        
                                        $resultado = mysqli_query($conexao,$sql);

                                        if(mysqli_num_rows($resultado)>0){
                                            while($linha = mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <td><?php echo $linha['id_hab']?></td>
                                                <td><?php echo $linha['habilidade']?></td>
                                                <td><?php echo $linha['id_curr']?></td>
                                            </tr>
                                            <?php
                                            }
                                        }else {
                                            echo '0 resultados encontrados';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                        <?php                             
                            $sql = 'SELECT * FROM competencias';
                            
                            $resultado = mysqli_query($conexao,$sql);

                            if(mysqli_num_rows($resultado)==0){
                                ?>
                            <a href="cadastrar_competencias.php" class="btn btn-secondary btn-icon-split" id="com">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Cadastrar Competências</span>
                            </a>                                
                            <p class="aviso">Você ainda não cadastrou nenhuma competência!</p>

                            <?php
                            }else{
                                ?>
                                <a href="cadastrar_competencias.php" class="btn btn-secondary btn-icon-split" id="com">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Cadastrar outra competência</span>
                                </a>
                                <?php
                            }
                            ?>
                        <div class="my-2"></div>
                        <div class='card shadow mb-4'>
                            <div class='card-header py-3'>
                                <h6 class='m-0 font-weight-bold text-primary'>Competências</h6>
                            </div>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th>ID_Comp</th>
                                                <th>Competência</th>
                                                <th>ID_Curr</th>                                   
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                        $sql = 'SELECT * FROM competencias';
                                        
                                        $resultado = mysqli_query($conexao,$sql);

                                        if(mysqli_num_rows($resultado)>0){
                                            while($linha = mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <td><?php echo $linha['id_comp'] ?></td>
                                                <td><?php echo $linha['competencia'] ?></td>
                                                <td><?php echo $linha['id_curr'] ?></td>
                                            </tr>

                                        <?php
                                            }
                                        }else {
                                            echo '0 resultados encontrados';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>     
                        <?php                         
                            $sql = 'SELECT * FROM educacao';
                            
                            $resultado = mysqli_query($conexao,$sql);

                            if(mysqli_num_rows($resultado)==0){
                                ?>
                            <a href="cadastrar_educacao.php" class="btn btn-secondary btn-icon-split" id="edu">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Cadastrar Educação</span>
                            </a>                                
                            <p class="aviso">Você ainda não cadastrou nenhuma formação!</p>

                            <?php
                            }else{
                                ?>
                                <a href="cadastrar_educacao.php" class="btn btn-secondary btn-icon-split" id="edu">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Cadastrar outra formação</span>
                                </a>
                                <?php
                            }
                            ?>
                        <div class="my-2"></div>
                        <div class='card shadow mb-4'>
                            <div class='card-header py-3'>
                                <h6 class='m-0 font-weight-bold text-primary'>Educação</h6>
                            </div>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th>ID_Educ</th>
                                                <th>Instituição</th>
                                                <th>Curso</th>
                                                <th>Início</th>
                                                <th>Fim</th>
                                                <th>ID_Curr</th>                                  
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                        $sql = 'SELECT * FROM educacao';
                                        
                                        $resultado = mysqli_query($conexao,$sql);

                                        if(mysqli_num_rows($resultado)>0){
                                            function data($data){
                                                return date("d/m/Y", strtotime($data));
                                            }
                                            while($linha = mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <td><?php echo $linha['id_educ'] ?></td>
                                                <td><?php echo $linha['instituicao'] ?></td>
                                                <td><?php echo $linha['curso'] ?></td>
                                                <td><?php
                                                echo data($linha['inicio']);
                                                ?></td>
                                                <td><?php  
                                                if($linha['fim'] !='0000-00-00'){
                                                    echo data($linha['fim']);
                                                    }else{
                                                        echo "Em Andamento";
                                                    } 
                                                    ?></td>
                                                <td><?php echo $linha['id_curr'] ?></td>
                                            </tr>
  
                                        <?php
                                            }
                                        }else {
                                            echo '0 resultados encontrados';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>              
                        <?php                
                            $sql = 'SELECT * FROM experiencia';
                            
                            $resultado = mysqli_query($conexao,$sql);

                            if(mysqli_num_rows($resultado)==0){
                                ?>
                            <a href="cadastrar_experiencia.php" class="btn btn-secondary btn-icon-split" id="exp">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Cadastrar Experiência</span>
                            </a>                                
                            <p class="aviso">Você ainda não cadastrou nenhuma experiência!</p>

                            <?php
                            }else{
                                ?>
                                <a href="cadastrar_experiencia.php" class="btn btn-secondary btn-icon-split" id="exp">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Cadastrar outra experiência</span>
                                </a>
                                <?php
                            }
                            ?>
                        <div class="my-2"></div>
                        <div class='card shadow mb-4'>
                            <div class='card-header py-3'>
                                <h6 class='m-0 font-weight-bold text-primary'>Experiência Profissional</h6>
                            </div>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th>ID_Exp</th>
                                                <th>Ocupação</th>
                                                <th>Empresa</th>
                                                <th>Início</th>
                                                <th>Fim</th>      
                                                <th>ID_Curr</th>                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                        $sql = 'SELECT * FROM experiencia';
                                        
                                        $resultado = mysqli_query($conexao,$sql);

                                        if(mysqli_num_rows($resultado)>0){                                             
                                            function data2($data){
                                                return date("d/m/Y", strtotime($data));
                                            }
                                            while($linha = mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <td><?php echo $linha['id_exp'] ?></td>
                                                <td><?php echo $linha['ocupacao'] ?></td>
                                                <td><?php echo $linha['empresa'] ?></td>
                                                <td><?php
                                                echo data2($linha['inicio']);
                                                ?></td>
                                                <td><?php  
                                                if($linha['fim'] !='0000-00-00'){
                                                    echo data2($linha['fim']);
                                                    }else{
                                                        echo "Em Andamento";
                                                    } 
                                                    ?></td>
                                                <td><?php echo $linha['id_curr'] ?></td>
                                            </tr>

                                        <?php
                                            }
                                        }else {
                                            echo '0 resultados encontrados';
                                        }
                                        mysqli_close($conexao);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <footer class='sticky-footer bg-white'>
                <div class='container my-auto'>
                    <div class='copyright text-center my-auto'>
                        <span>Copyright &copy; Banco de Currículos ETEC MCM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class='scroll-to-top rounded' href='#page-top'>
        <i class='fas fa-angle-up'></i>
    </a>

    <!-- Logout Modal-->
    <div class='modal fade' id='logoutModal' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para encerrar sua sessão ativa.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Sair</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>