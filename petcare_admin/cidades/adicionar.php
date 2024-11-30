<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PetCare Admin - Adicionar Cidade</title>
    
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
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

            <li class="nav-item active">
                <a class="nav-link" href="cidade.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Cidades</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Adicionar Cidade</h1>

                    <form action="adicionar_submit.php" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="nm_cidade">Cidade:</label>
                            <input type="text" name="nm_cidade" id="nm_cidade" class="form-control" placeholder="Nome da cidade" required>
                        </div>
                        <div class="form-group">
                            <label for="estado_id">Estado:</label>
                            <select name="estado_id" id="estado_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php
                                include('../config/conecta.php');
                                $sql_estado = $conn->prepare("SELECT * FROM tb_estado");
                                $sql_estado->execute();
                                $result_estado = $sql_estado->fetchAll();
                                foreach ($result_estado as $data) {
                                    echo '<option value="' . htmlspecialchars($data['id_estado']) . '">' . htmlspecialchars($data['nome']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </form>

                    <a href="cidade.php" class="btn btn-secondary">Voltar</a>
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
