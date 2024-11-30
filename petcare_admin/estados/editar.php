<?php 
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Corrigindo a consulta SQL
    $sql = $conn->prepare("SELECT e.*, r.* FROM tb_estado e LEFT JOIN tb_regiao r ON r.id_regiao = e.regiao_id WHERE e.id_estado = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    if ($result) {
        // Busca todas as regiões para preencher o dropdown
        $sql_regiao = $conn->prepare("SELECT * FROM tb_regiao");
        $sql_regiao->execute();
        $result_regiao = $sql_regiao->fetchAll();
    } else {
        echo "Estado não encontrado.";
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
    <title>PetCare Admin - Editar Estado</title>
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
                <a class="nav-link" href="estado.php">
                    <i class="fas fa-map fa-2x text-gray-300"></i>
                    <span>Estados</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">


                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Estado</h1>

                    <form action="editar_submit.php" method="post">
                        <input type="hidden" name="id_estado" value="<?= htmlspecialchars($result['id_estado']) ?>">
                        
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?= htmlspecialchars($result['nome']) ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" name="uf" id="uf" value="<?= htmlspecialchars($result['uf']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="regiao_id">Região</label>
                            <select name="regiao_id" id="regiao_id" class="form-control" required>
                                <option value="" disabled>Selecione</option>
                                <?php foreach ($result_regiao as $data) { ?>
                                    <option value="<?= htmlspecialchars($data['id_regiao']) ?>" <?= $data['id_regiao'] == $result['regiao_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($data['nm_regiao']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="estado.php" class="btn btn-secondary">Cancelar</a>
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
