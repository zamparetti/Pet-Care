<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Recupera os dados necessários do banco
$sql_vendedor = $conn->prepare("SELECT * FROM tb_vendedor");
$sql_vendedor->execute();
$result_vendedor = $sql_vendedor->fetchAll();

$sql_cliente = $conn->prepare("SELECT * FROM tb_cliente");
$sql_cliente->execute();
$result_cliente = $sql_cliente->fetchAll();

$sql_natureza = $conn->prepare("SELECT * FROM tb_natureza");
$sql_natureza->execute();
$result_natureza = $sql_natureza->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare Admin - Adicionar Venda</title>
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
            <a class="nav-link" href="../vendas/venda.php">
                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                <span>Vendas</span>
            </a>
        </li>
        
        <!-- Adicione outras entradas do menu aqui, conforme necessário -->
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Adicionar Venda</h1>

                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars($_SESSION['message']); ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <form action="adicionar_submit.php" method="POST">
                    <div class="form-group">
                        <label for="dt_venda">Data da Venda:</label>
                        <input type="date" name="dt_venda" id="dt_venda" class="form-control" placeholder="Data" required>
                    </div>

                    <div class="form-group">
                        <label for="vendedor_id">Nome do Vendedor:</label>
                        <select name="vendedor_id" id="vendedor_id" class="form-control" required>
                            <option value="" selected>Selecione</option>
                            <?php foreach ($result_vendedor as $data): ?>
                                <option value="<?= htmlspecialchars($data['id_vendedor']); ?>">
                                    <?= htmlspecialchars($data['nm_vendedor']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cliente_id">Nome do Cliente:</label>
                        <select name="cliente_id" id="cliente_id" class="form-control" required>
                            <option value="" selected>Selecione</option>
                            <?php foreach ($result_cliente as $data): ?>
                                <option value="<?= htmlspecialchars($data['id_cliente']); ?>">
                                    <?= htmlspecialchars($data['nm_cliente']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="natureza_id">Natureza:</label>
                        <select name="natureza_id" id="natureza_id" class="form-control" required>
                            <option value="" selected>Selecione</option>
                            <?php foreach ($result_natureza as $data): ?>
                                <option value="<?= htmlspecialchars($data['id_natureza']); ?>">
                                    <?= htmlspecialchars($data['nm_natureza']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="submit" value="Enviar" class="btn btn-primary">
                    <a href="venda.php" class="btn btn-secondary">Cancelar</a>
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
