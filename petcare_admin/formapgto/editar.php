<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Forma de Pagamento</title>
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
                <a class="nav-link" href="formapgto.php">
                    <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                    <span>Formas de Pagamento</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Forma de Pagamento</h1>

                    <?php
                    include('../config/conecta.php');

                    if (!empty($_GET['id'])) {
                        $id = $_GET['id'];
                    }

                    // Consulta para pegar a forma de pagamento a ser editada
                    $sql = $conn->prepare("SELECT * FROM tb_forma_pgto WHERE id_forma_pgto = :id_forma_pgto LIMIT 1");
                    $sql->bindValue(':id_forma_pgto', $id);
                    $sql->execute();
                    $result = $sql->fetch();
                    ?>

                    <!-- Formulário de Edição de Forma de Pagamento -->
                    <form action="editar_submit.php" method="post">
                        <input type="hidden" name="id_forma_pgto" value="<?php echo $result['id_forma_pgto'] ?>">

                        <div class="form-group">
                            <label for="nm_forma_pgto">Forma de Pagamento</label>
                            <input type="text" class="form-control" name="nm_forma_pgto" value="<?php echo $result['nm_forma_pgto'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="formapgto.php" class="btn btn-secondary">Cancelar</a>
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