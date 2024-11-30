<?php
session_start();
include('../config/conecta.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare Admin - Adicionar Forma de Pagamento</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
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
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Gerenciamento Tabelas</div>
            <li class="nav-item active">
                <a class="nav-link" href="forma_pgto.php">
                    <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                    <span>Formas de Pagamento</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Adicionar Forma de Pagamento</h1>

                    <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success">
                      <?php echo htmlspecialchars($_SESSION['message']); ?>
        </div>
                    <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>


                    <!-- Formulário de Adicionar Forma de Pagamento -->
                    <form action="adicionar_submit.php" method="post">
                        <div class="form-group">
                            <label for="nm_forma_pgto">Nome da Forma de Pagamento</label>
                            <input type="text" class="form-control" name="nm_forma_pgto" id="nm_forma_pgto" placeholder="Nome da forma de pagamento" required>
                        </div>

                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="forma_pgto.php" class="btn btn-secondary">Cancelar</a>
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
        </div>
    </div>

</body>

</html>
