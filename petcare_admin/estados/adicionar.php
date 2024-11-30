<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PetCare Admin - Adicionar Estado</title>
    
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
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Gerenciamento Tabelas</div>

            <li class="nav-item">
                <a class="nav-link" href="../cidades/cidade.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Cidades</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="estado.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Estados</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Adicionar Estado</h1>

                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-info">
                            <?php echo htmlspecialchars($_SESSION['message']); ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <form action="adicionar_submit.php" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="nome">Nome do Estado:</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do estado" required>
                        </div>
                        <div class="form-group">
                            <label for="uf">UF:</label>
                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Sigla do estado" maxlength="2" required>
                        </div>
                        <div class="form-group">
                            <label for="regiao_id">Região:</label>
                            <select name="regiao_id" id="regiao_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php
                                include('../config/conecta.php');
                                $sql_regiao = $conn->prepare("SELECT * FROM tb_regiao");
                                $sql_regiao->execute();
                                $result_regiao = $sql_regiao->fetchAll();
                                foreach ($result_regiao as $data) {
                                    echo '<option value="' . htmlspecialchars($data['id_regiao']) . '">' . htmlspecialchars($data['nm_regiao']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </form>

                    <a href="estado.php" class="btn btn-secondary">Voltar</a>
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
