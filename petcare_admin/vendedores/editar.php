<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <title>PetCare Admin - Editar Vendedor</title>
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
        <li class="nav-item active">
            <a class="nav-link" href="vendedor.php">
                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                <span>Vendedores</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Editar Vendedor</h1>

                <?php
                include('../config/conecta.php');

                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = $conn->prepare("SELECT * FROM tb_vendedor WHERE id_vendedor = :id");
                    $sql->bindParam(':id', $id);
                    $sql->execute();
                    $result = $sql->fetch();

                    if (!$result) {
                        echo "<div class='alert alert-danger'>Vendedor não encontrado.</div>";
                        exit;
                    }
                } else {
                    echo "<div class='alert alert-danger'>ID inválido.</div>";
                    exit;
                }
                ?>

                <form action="editar_submit.php" method="post">
                    <div class="form-group">
                        <label>Nome vendedor:</label>
                        <input type="text" class="form-control" name="nm_vendedor" value="<?php echo htmlspecialchars($result['nm_vendedor']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Percentual de comissão:</label>
                        <input type="text" class="form-control" name="perc_comissao" value="<?php echo htmlspecialchars($result['perc_comissao']); ?>" required>
                    </div>
                    <input type="hidden" name="id_vendedor" value="<?php echo htmlspecialchars($result['id_vendedor']); ?>">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="vendedor.php" class="btn btn-secondary">Cancelar</a>
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
