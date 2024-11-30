<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = trim($_GET['id']);

    // Prepara a consulta SQL
    $sql = $conn->prepare("SELECT * FROM tb_grupo WHERE id_grupo = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    // Verifica se algum resultado foi retornado
    if ($result) {
        ?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PetCare Admin - Editar Grupo</title>
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
                        <a class="nav-link" href="grupo.php">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                            <span>Grupos</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">
                </ul>

                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800">Editar Grupo</h1>

                            <form action="editar_submit.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="nm_grupo">Nome</label>
                                    <input type="text" class="form-control" name="nm_grupo" id="nm_grupo" value="<?php echo htmlspecialchars($result['nm_grupo']); ?>" required>
                                </div>
                                <input type="hidden" name="id_grupo" value="<?php echo htmlspecialchars($result['id_grupo']); ?>">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <a href="grupo.php" class="btn btn-secondary">Cancelar</a>
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
    } else {
        echo "<p>Nenhum grupo encontrado com o ID: " . htmlspecialchars($id) . "</p>";
    }
}
?>
