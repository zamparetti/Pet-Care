<?php
include('../config/conecta.php');

if (isset($_GET['id'])) {
    $id_cidade = $_GET['id'];

    // Busca a cidade com base no ID
    $sql = $conn->prepare("SELECT c.*, e.uf FROM tb_cidade c LEFT JOIN tb_estado e ON e.id_estado = c.estado_id WHERE c.id_cidade = :id");
    $sql->bindParam(':id', $id_cidade, PDO::PARAM_INT);
    $sql->execute();
    $cidade = $sql->fetch();

    // Se a cidade for encontrada
    if ($cidade) {
        // Busca todos os estados para preencher o dropdown
        $sql_estado = $conn->prepare("SELECT * FROM tb_estado");
        $sql_estado->execute();
        $estados = $sql_estado->fetchAll();
    } else {
        echo "Cidade não encontrada.";
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
    <title>PetCare Admin - Editar Cidade</title>
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
                <a class="nav-link" href="cidade.php">
                    <i class="fas fa-city fa-2x text-gray-300"></i>
                    <span>Cidades</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Cidade</h1>

                    <form action="editar_submit.php" method="post">
                        <div class="form-group">
                            <label for="nm_cidade">Nome da Cidade</label>
                            <input type="text" class="form-control" name="nm_cidade" id="nm_cidade" value="<?= $cidade['nm_cidade'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="estado_id">Estado</label>
                            <select name="estado_id" class="form-control" id="estado_id" required>
                                <option value="" disabled>Selecione</option>
                                <?php foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>" <?= $estado['id_estado'] == $cidade['estado_id'] ? 'selected' : '' ?>>
                                        <?= $estado['nome'] ?> (<?= $estado['uf'] ?>)
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="cidade.php" class="btn btn-secondary">Cancelar</a>
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