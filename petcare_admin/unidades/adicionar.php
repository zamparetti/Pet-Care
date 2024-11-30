<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Adicionar Unidade</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PetCare Admin</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Gerenciamento Tabelas</div>

            <li class="nav-item">
                <a class="nav-link" href="../unidades/unidade.php">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    <span>Unidades</span>
                </a>
            </li>

            <!-- Adicione outras entradas do menu aqui, conforme necessário -->

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Adicionar Unidade</h1>

                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= htmlspecialchars($_SESSION['message']); ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <form action="adicionar_submit.php" method="post" class="mb-4">
                        <div class="form-group">
                            <label for="nm_unidade">Nome da Unidade</label>
                            <input type="text" name="nm_unidade" id="nm_unidade" class="form-control" placeholder="Nome da unidade" required>
                        </div>
                        <div class="form-group">
                            <label for="sigla_unidade">Sigla</label>
                            <input type="text" name="sigla_unidade" id="sigla_unidade" class="form-control" placeholder="Sigla" required maxlength="2">
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-primary">
                        <a href="unidade.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PetCare 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
</html>
