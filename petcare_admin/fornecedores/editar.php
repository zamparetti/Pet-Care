<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = trim($_GET['id']);
    
    // Prepara a consulta SQL
    $sql = $conn->prepare("SELECT f.*, c.* FROM tb_fornecedor f LEFT JOIN tb_cidade c ON c.id_cidade = f.cidade_id WHERE f.id_fornecedor = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    // Consulta para buscar cidades
    $sql_cidade = $conn->prepare("SELECT * FROM tb_cidade");
    $sql_cidade->execute();
    $result_cidade = $sql_cidade->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare Admin - Editar Fornecedor</title>
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
                <a class="nav-link" href="fornecedor.php">
                    <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    <span>Fornecedores</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Fornecedor</h1>

                    <form action="editar_submit.php" method="post">
                        <input type="hidden" name="id_fornecedor" value="<?php echo htmlspecialchars($result['id_fornecedor']); ?>">
                        <div class="form-group mb-3">
                            <label for="nm_fornecedor">Fornecedor</label>
                            <input type="text" class="form-control" name="nm_fornecedor" value="<?php echo htmlspecialchars($result['nm_fornecedor']); ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cidade_id">Cidade</label>
                            <select name="cidade_id" class="form-control" required>
                                <option value="" selected>Selecione</option>
                                <?php foreach ($result_cidade as $data): ?>
                                    <option value="<?php echo htmlspecialchars($data['id_cidade']); ?>" <?php if ($data['id_cidade'] == $result['cidade_id']) { ?> selected <?php } ?>>
                                        <?php echo htmlspecialchars($data['nm_cidade']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cpf_fornecedor">CPF</label>
                            <input type="text" class="form-control" name="cpf_fornecedor" value="<?php echo htmlspecialchars($result['cpf_fornecedor']); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email_fornecedor">Email</label>
                            <input type="text" class="form-control" name="email_fornecedor" value="<?php echo htmlspecialchars($result['email_fornecedor']); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cnpj_fornecedor">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj_fornecedor" value="<?php echo htmlspecialchars($result['cnpj_fornecedor']); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telefone_fornecedor">Telefone</label>
                            <input type="text" class="form-control" name="telefone_fornecedor" value="<?php echo htmlspecialchars($result['telefone_fornecedor']); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="fornecedor.php" class="btn btn-secondary">Cancelar</a>
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

<?php
}
?>
