<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o ID do comprador foi passado pela URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Recupera os dados do comprador do banco
    $sql = $conn->prepare("SELECT * FROM tb_comprador WHERE id_comprador = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Editar Comprador</title>
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
                    <i class="fas fa-paw"></i>
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
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <div class="sidebar-heading">Gerenciamento Tabelas</div>
                <!-- Outros itens do menu -->
                <li class="nav-item">
                    <a class="nav-link" href="../compradores/comprador.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Compradores</span>
                    </a>
                </li>
    
            </div>
        </ul>
        <!-- Sidebar Fim -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <!-- Mensagem de sucesso ou erro -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['message']; ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <h1 class="h3 mb-2 text-gray-800">Editar Comprador</h1>

                    <!-- Formulário de Edição -->
                    <?php if (!empty($result)): ?>
                    <form action="editar_submit.php" method="post">
                        <div class="form-group">
                            <label for="nm_comprador">Nome</label>
                            <input type="text" name="nm_comprador" id="nm_comprador" class="form-control" value="<?php echo $result['nm_comprador']; ?>" required>
                        </div>

                        <input type="hidden" name="id_comprador" value="<?php echo $result['id_comprador']; ?>">

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                    <?php else: ?>
                        <p>Comprador não encontrado.</p>
                    <?php endif; ?>

                    <a href="comprador.php" class="btn btn-secondary mt-3">Voltar</a>
                </div>
            </div>
            <!-- Fim de content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PetCare 2024</span>
                    </div>
                </div>
            </footer>

            <!-- Scroll to top -->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <!-- Fim de content-wrapper -->
    </div>
    <!-- Fim de wrapper -->

</body>
</html>
