<?php 
session_start(); // Inicia a sessão
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = $conn->prepare("SELECT * FROM tb_usuario WHERE id_usuario = :id");
$sql->bindParam(':id', $id);
$sql->execute();
$result = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Usuário</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PetCare Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <div class="sidebar-heading">Gerenciamento Tabelas</div>
                <li class="nav-item">
                    <a class="nav-link" href="../cidades/cidade.php">
                        <i class="fas fa-city fa-2x text-gray-300"></i>
                        <span>Cidades</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../estados/estado.php">
                        <i class="fas fa-map fa-2x text-gray-300"></i>
                        <span>Estados</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../clientes/cliente.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../fornecedores/fornecedor.php">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        <span>Fornecedores</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../grupos/grupo.php">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        <span>Grupos</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../naturezas/natureza.php">
                        <i class="fas fa-leaf fa-2x text-gray-300"></i>
                        <span>Naturezas</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../regioes/regiao.php">
                        <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        <span>Regiões</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../unidades/unidade.php">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                        <span>Unidades</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../emitentes/emitente.php">
                        <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                        <span>Emitentes</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="usuario.php">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        <span>Usuários</span>
                    </a>
                </li>
            </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Usuário</h1>
                    <a href="usuario.php" class="btn btn-primary mb-3">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>

                    <form action="editar_usuario_submit.php" method="post">
                        <div class="form-group mb-3">
                            <label for="nm_usuario">Nome do Usuário:</label>
                            <input type="text" name="nm_usuario" value="<?php echo $result['nm_usuario']?>" id="nm_usuario" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email_usuario">Email do Usuário:</label>
                            <input type="email" name="email_usuario" value="<?php echo $result['email_usuario']?>" id="email_usuario" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="login_usuario">Login do Usuário:</label>
                            <input type="text" name="login_usuario" value="<?php echo $result['login_usuario']?>" id="login_usuario" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="senha_usuario">Senha do Usuário:</label>
                            <input type="text" name="senha_usuario" value="<?php echo $result['senha_usuario']?>" id="senha_usuario" class="form-control" required>
                        </div>

                        <input type="hidden" name="id_usuario" value="<?php echo $result['id_usuario']?>" id="id_usuario">
                        
                        <div class="form-group">
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PetCare 2024</span>
                    </div>
                </div>
            </footer>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</body>

</html>
