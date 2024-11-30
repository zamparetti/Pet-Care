<?php
include('../config/conecta.php');

// Verificação do ID via GET
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Consulta para pegar os dados da compra e fornecedor
    $sql = $conn->prepare("SELECT c.*, f.* FROM tb_compra c LEFT JOIN tb_fornecedor f ON f.id_fornecedor = c.fornecedor_id WHERE c.id_compra = :id LIMIT 1");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $result = $sql->fetch();

    // Consulta para pegar todos os fornecedores
    $sql_fornecedor = $conn->prepare("SELECT * FROM tb_fornecedor");
    $sql_fornecedor->execute();
    $result_fornecedor = $sql_fornecedor->fetchAll();
} else {
    echo "ID inválido ou não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Compra</title>
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
                    <i class="fas fa-laugh-wink"></i>
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
            <li class="nav-item">
                    <a class="nav-link" href="compras/compra.php">
                        <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                        <span>Compras</span>
                    </a>
                </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Compra</h1>

                    <form action="editar_submit.php" method="post">

                        <div class="form-group">
                            <label for="data_compra">Data de Compra</label>
                            <input type="text" class="form-control" name="data_compra" id="data_compra" value="<?= htmlspecialchars($result['data_compra']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="fornecedor_id">Fornecedor</label>
                            <select name="fornecedor_id" class="form-control" id="fornecedor_id" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_fornecedor as $data) { ?>
                                    <option value="<?= $data['id_fornecedor'] ?>" <?= $data['id_fornecedor'] == $result['fornecedor_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($data['nm_fornecedor']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <input type="hidden" name="id_compra" value="<?= htmlspecialchars($result['id_compra']) ?>">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="compra.php" class="btn btn-secondary">Cancelar</a>
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