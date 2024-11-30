<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta o nome do comprador
    $nm_comprador = $_POST['nm_comprador'];

    // Insere o novo comprador no banco de dados
    $sql = $conn->prepare("INSERT INTO tb_comprador (nm_comprador) VALUES (:nm_comprador)");
    $sql->bindParam(':nm_comprador', $nm_comprador);
    
    if ($sql->execute()) {
        $_SESSION['message'] = "Comprador adicionado com sucesso!";
        header("Location: comprador.php"); // Redireciona para a página de listagem de compradores
        exit();
    } else {
        $_SESSION['message'] = "Erro ao adicionar comprador.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Adicionar Comprador</title>
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
                <!-- Outros itens do menu -->
                <li class="nav-item">
                    <a class="nav-link" href="../compradores/comprador.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Compradores</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../vendedores/vendedor.php">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        <span>Vendedores</span>
                    </a>
                </li>
                <!-- Outros itens do menu -->
            </div>
        </ul>
        <!-- Sidebar Fim -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <!-- Mensagem de sucesso ou erro -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['message']; ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <h1 class="h3 mb-2 text-gray-800">Adicionar Novo Comprador</h1>

                    <!-- Formulário de Adicionar Comprador -->
                    <form action="" method="post" class="mb-4">
                        <div class="form-group">
                            <label for="nm_comprador">Nome do Comprador</label>
                            <input type="text" name="nm_comprador" id="nm_comprador" class="form-control" placeholder="Nome do comprador" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar Comprador</button>
                    </form>

                    <a href="comprador.php" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
            <!-- Fim de content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PetCare 2024</span>
                    </div>
                </div>
            </footer>

            <!-- Scroll to top -->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <!-- Fim de content-wrapper -->
    </div>
    <!-- Fim de wrapper -->

</body>
</html>
