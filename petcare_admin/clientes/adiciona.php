<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Adicionar Cliente</title>
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
                <a class="nav-link" href="cliente.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Adicionar Cliente</h1>
                    <form action="adiciona_submit.php" method="post">
                        <div class="form-group">
                            <label for="nm_cliente">Nome:</label>
                            <input type="text" class="form-control" name="nm_cliente" id="nm_cliente" placeholder="Nome do Cliente" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf_cliente">CPF:</label>
                            <input type="text" class="form-control" name="cpf_cliente" id="cpf_cliente" placeholder="CPF do Cliente" required>
                        </div>

                        <div class="form-group">
                            <label for="end_rua">Rua:</label>
                            <input type="text" class="form-control" name="end_rua" id="end_rua" placeholder="Nome da Rua" required>
                        </div>

                        <div class="form-group">
                            <label for="end_nro">Número Endereço:</label>
                            <input type="text" class="form-control" name="end_nro" id="end_nro" placeholder="Número Endereço" required>
                        </div>

                        <div class="form-group">
                            <label for="end_bairro">Bairro:</label>
                            <input type="text" class="form-control" name="end_bairro" id="end_bairro" placeholder="Nome do Bairro" required>
                        </div>

                        <div class="form-group">
                            <label for="cidade_id">Cidade:</label>
                            <select name="cidade_id" class="form-control" id="cidade_id" required>
                                <option value="" selected>Selecione:</option>
                                <?php 
                                include('../config/conecta.php');
                                $sql_cidade = $conn->prepare("SELECT * FROM tb_cidade");
                                $sql_cidade->execute();
                                $result_cidade = $sql_cidade->fetchAll();

                                foreach ($result_cidade as $data) { ?>
                                    <option value="<?php echo htmlspecialchars($data['id_cidade']) ?>"><?php echo htmlspecialchars($data['nm_cidade']) ?></option> 
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <a href="cliente.php" class="btn btn-secondary">Voltar</a>
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
