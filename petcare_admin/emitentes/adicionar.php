<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Obter lista de cidades para o dropdown
$sql_cidade = $conn->prepare("SELECT * FROM tb_cidade");
$sql_cidade->execute();
$result_cidade = $sql_cidade->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Adicionar Emitente</title>
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
                <a class="nav-link" href="emitente.php">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                    <span>Emitentes</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= htmlspecialchars($_SESSION['message']); ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <h1 class="h3 mb-4 text-gray-800">Adicionar Emitente</h1>

                    <form action="adicionar_submit.php" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="nm_emitente">Nome:</label>
                            <input type="text" name="nm_emitente" id="nm_emitente" class="form-control" placeholder="Nome do Emitente" required>
                        </div>
                        <div class="form-group">
                            <label for="cidade_id">Cidade:</label>
                            <select name="cidade_id" id="cidade_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_cidade as $data): ?>
                                    <option value="<?= htmlspecialchars($data['id_cidade']); ?>"><?= htmlspecialchars($data['nm_cidade']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cnpj_emitente">CNPJ:</label>
                            <input type="text" name="cnpj_emitente" id="cnpj_emitente" class="form-control" placeholder="CNPJ do Emitente" required>
                        </div>
                        <div class="form-group">
                            <label for="end_rua">Rua:</label>
                            <input type="text" name="end_rua" id="end_rua" class="form-control" placeholder="Nome da rua" required>
                        </div>
                        <div class="form-group">
                            <label for="end_nro">N.º da Casa:</label>
                            <input type="text" name="end_nro" id="end_nro" class="form-control" placeholder="Número da casa" required>
                        </div>
                        <div class="form-group">
                            <label for="end_bairro">Bairro:</label>
                            <input type="text" name="end_bairro" id="end_bairro" class="form-control" placeholder="Nome do bairro" required>
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-primary">
                        <a href="emitente.php" class="btn btn-secondary">Cancelar</a>
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

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</body>
</html>