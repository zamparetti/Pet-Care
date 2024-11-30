<?php
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    // Busca o produto com base no ID
    $sql = $conn->prepare("SELECT * FROM tb_produto WHERE id_produto = :id");
    $sql->bindParam(':id', $id_produto, PDO::PARAM_INT);
    $sql->execute();
    $produto = $sql->fetch();

    // Se o produto não for encontrado
    if (!$produto) {
        echo "Produto não encontrado.";
        exit;
    }
} else {
    echo "ID não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Produto</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="produto.php">
                    <i class="fas fa-box-open fa-2x text-gray-300"></i>
                    <span>Produtos</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Produto</h1>

                    <form action="editar_produto_submit.php" method="post">
                        <input type="hidden" name="id_produto" value="<?= htmlspecialchars($produto['id_produto']) ?>">
                        <div class="form-group">
                            <label for="nm_produto">Nome do Produto</label>
                            <input type="text" class="form-control" name="nm_produto" id="nm_produto" value="<?= htmlspecialchars($produto['nm_produto']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="preco_produto">Preço do Produto</label>
                            <input type="number" step="0.01" class="form-control" name="preco_produto" id="preco_produto" value="<?= htmlspecialchars($produto['preco_produto']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="desc_produto">Descrição do Produto</label>
                            <textarea class="form-control" name="desc_produto" id="desc_produto" required><?= htmlspecialchars($produto['desc_produto']) ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="produto.php" class="btn btn-secondary">Cancelar</a>
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
