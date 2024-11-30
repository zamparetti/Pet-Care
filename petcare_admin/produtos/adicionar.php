<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Adicionar Produto</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="produtos.php">
                    <i class="fas fa-box-open fa-2x text-gray-300"></i>
                    <span>Produtos</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Adicionar Produto</h1>

                    <?php
                    session_start();
                    if (isset($_SESSION['mensagem'])) {
                        echo '<div class="alert alert-info" role="alert">' . $_SESSION['mensagem'] . '</div>';
                        unset($_SESSION['mensagem']);
                    }

                    include('../config/conecta.php');

                    $sql_grupo = $conn->prepare("SELECT * FROM tb_grupo");
                    $sql_grupo->execute();
                    $result_grupo = $sql_grupo->fetchAll();

                    $sql_unidade = $conn->prepare("SELECT * FROM tb_unidade");
                    $sql_unidade->execute();
                    $result_unidade = $sql_unidade->fetchAll();
                    ?>

                    <form action="adicionar_submit.php" method="POST">
                        <div class="form-group">
                            <label for="nm_produto">Produto:</label>
                            <input type="text" name="nm_produto" id="nm_produto" class="form-control" placeholder="Nome do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="unidade_id">Unidade:</label>
                            <select name="unidade_id" id="unidade_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_unidade as $data) { ?>
                                    <option value="<?php echo $data['id_unidade']; ?>"><?php echo $data['nm_unidade']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="grupo_id">Grupo:</label>
                            <select name="grupo_id" id="grupo_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_grupo as $data) { ?>
                                    <option value="<?php echo $data['id_grupo']; ?>"><?php echo $data['nm_grupo']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="preco_venda">Preço Venda:</label>
                            <input type="text" name="preco_venda" id="preco_venda" class="form-control" placeholder="Preço da venda" required>
                        </div>
                        <div class="form-group">
                            <label for="preco_compra">Preço Compra:</label>
                            <input type="text" name="preco_compra" id="preco_compra" class="form-control" placeholder="Preço da compra" required>
                        </div>
                        <div class="form-group">
                            <label for="qtd_estoque">Quantidade Estoque:</label>
                            <input type="text" name="qtd_estoque" id="qtd_estoque" class="form-control" placeholder="Quantidade em estoque" required>
                        </div>
                        <div class="form-group">
                            <label for="nm_foto">Foto do Produto:</label>
                            <input type="text" name="nm_foto" id="nm_foto" class="form-control" placeholder="Caminho da foto" required>
                        </div>
                        <div class="form-group">
                            <label for="sequencia">Sequência:</label>
                            <input type="text" name="sequencia" id="sequencia" class="form-control" placeholder="Digite a posição do seu produto" required>
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-primary">
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
