<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT v.*, ve.*, c.*, n.* FROM tb_venda v
    LEFT JOIN tb_vendedor ve ON ve.id_vendedor = v.fk_id_vendedor
    LEFT JOIN tb_cliente c ON c.id_cliente = v.fk_id_cliente
    LEFT JOIN tb_natureza n ON n.id_natureza = v.fk_id_natureza
    WHERE v.id = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    $sql_vendedor = $conn->prepare("SELECT * FROM tb_vendedor");
    $sql_vendedor->execute();
    $result_vendedor = $sql_vendedor->fetchAll();

    $sql_cliente = $conn->prepare("SELECT * FROM tb_cliente");
    $sql_cliente->execute();
    $result_cliente = $sql_cliente->fetchAll();

    $sql_natureza = $conn->prepare("SELECT * FROM tb_natureza");
    $sql_natureza->execute();
    $result_natureza = $sql_natureza->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Venda</title>
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

            <li class="nav-item">
                <a class="nav-link" href="../estados/estado.php">
                    <i class="fas fa-map fa-2x text-gray-300"></i>
                    <span>Estados</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../clientes/cliente.php">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../fornecedores/fornecedor.php">
                    <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    <span>Fornecedores</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../grupos/grupo.php">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    <span>Grupos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../unidade/unidade.php">
                    <i class="fas fa-map fa-2x text-gray-300"></i>
                    <span>Vendas</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Venda</h1>

                    <form action="editar_submit.php" method="post" class="mb-4">
                        <div class="form-group">
                            <label for="dt_venda">Data da venda</label>
                            <input type="date" name="dt_venda" id="dt_venda" value="<?= htmlspecialchars($result['dt_venda']); ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vendedor_id">Nome do Vendedor</label>
                            <select name="vendedor_id" id="vendedor_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_vendedor as $data): ?>
                                    <option value="<?= htmlspecialchars($data['id_vendedor']); ?>" <?= ($data['id_vendedor'] == $result['fk_id_vendedor']) ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($data['nm_vendedor']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cliente_id">Nome do Cliente</label>
                            <select name="cliente_id" id="cliente_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_cliente as $data): ?>
                                    <option value="<?= htmlspecialchars($data['id_cliente']); ?>" <?= ($data['id_cliente'] == $result['fk_id_cliente']) ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($data['nm_cliente']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="natureza_id">Natureza</label>
                            <select name="natureza_id" id="natureza_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_natureza as $data): ?>
                                    <option value="<?= htmlspecialchars($data['id_natureza']); ?>" <?= ($data['id_natureza'] == $result['fk_id_natureza']) ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($data['nm_natureza']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($result['id']); ?>">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
</body>
</html>