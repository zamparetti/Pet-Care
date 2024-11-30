<?php
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = $conn->prepare("SELECT p.*, g.nm_grupo, u.nm_unidade FROM tb_produto p 
                           LEFT JOIN tb_grupo g ON g.id_grupo = p.grupo_id 
                           LEFT JOIN tb_unidade u ON u.id_unidade = p.unidade_id
                           WHERE p.id_produto = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    if ($result) {
        $sql_grupo = $conn->prepare("SELECT * FROM tb_grupo");
        $sql_grupo->execute();
        $result_grupo = $sql_grupo->fetchAll();

        $sql_unidade = $conn->prepare("SELECT * FROM tb_unidade");
        $sql_unidade->execute();
        $result_unidade = $sql_unidade->fetchAll();
    } else {
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
                <a class="nav-link" href="produto.php">
                    <i class="fas fa-box fa-2x text-gray-300"></i>
                    <span>Produtos</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Produto</h1>

                    <!-- Alerta -->
                    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Produto atualizado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } elseif (isset($_GET['error']) && $_GET['error'] == 1) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Erro ao atualizar o produto.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                    <form action="editar_submit.php" method="post">
                        <input type="hidden" name="id_produto" value="<?= htmlspecialchars($result['id_produto']) ?>">
                        
                        <div class="form-group">
                            <label for="nm_produto">Nome do Produto</label>
                            <input type="text" class="form-control" name="nm_produto" id="nm_produto" value="<?= htmlspecialchars($result['nm_produto']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="grupo_id">Grupo</label>
                            <select name="grupo_id" id="grupo_id" class="form-control" required>
                                <option value="" disabled>Selecione</option>
                                <?php foreach ($result_grupo as $data) { ?>
                                    <option value="<?= htmlspecialchars($data['id_grupo']) ?>" <?= $data['id_grupo'] == $result['grupo_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($data['nm_grupo']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="unidade_id">Unidade</label>
                            <select name="unidade_id" id="unidade_id" class="form-control" required>
                                <option value="" disabled>Selecione</option>
                                <?php foreach ($result_unidade as $data) { ?>
                                    <option value="<?= htmlspecialchars($data['id_unidade']) ?>" <?= $data['id_unidade'] == $result['unidade_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($data['nm_unidade']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="preco_venda">Preço de Venda</label>
                            <input type="text" class="form-control" name="preco_venda" id="preco_venda" value="<?= htmlspecialchars($result['preco_venda']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="preco_compra">Preço de Compra</label>
                            <input type="text" class="form-control" name="preco_compra" id="preco_compra" value="<?= htmlspecialchars($result['preco_compra']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="qtd_estoque">Quantidade em Estoque</label>
                            <input type="text" class="form-control" name="qtd_estoque" id="qtd_estoque" value="<?= htmlspecialchars($result['qtd_estoque']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nm_foto">Foto do Produto</label>
                            <input type="text" class="form-control" name="nm_foto" id="nm_foto" value="<?= htmlspecialchars($result['nm_foto']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="sequencia">Sequência</label>
                            <input type="text" class="form-control" name="sequencia" id="sequencia" value="<?= htmlspecialchars($result['sequencia']) ?>" required>
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
