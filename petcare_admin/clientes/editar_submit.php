<?php
include('../config/conecta.php');

$id_cliente = $_POST['id_cliente'];
$nm_cliente = $_POST['nm_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$end_rua = $_POST['end_rua'];
$end_nro = $_POST['end_nro'];
$end_bairro = $_POST['end_bairro'];
$cidade_id = $_POST['cidade_id'];

try {
    $sql = $conn->prepare("UPDATE tb_cliente SET 
        nm_cliente = :nm_cliente, 
        cpf_cliente = :cpf_cliente, 
        end_rua = :end_rua, 
        end_nro = :end_nro, 
        end_bairro = :end_bairro, 
        cidade_id = :cidade_id
        WHERE id_cliente = :id_cliente");

    $sql->bindParam(':nm_cliente', $nm_cliente);
    $sql->bindParam(':cpf_cliente', $cpf_cliente);
    $sql->bindParam(':end_rua', $end_rua);
    $sql->bindParam(':end_nro', $end_nro);
    $sql->bindParam(':end_bairro', $end_bairro);
    $sql->bindParam(':cidade_id', $cidade_id);
    $sql->bindParam(':id_cliente', $id_cliente);

    $sql->execute();

    // Mensagem de sucesso
    session_start();
    $_SESSION['message'] = "Cliente atualizado com sucesso!";
    header('Location: cliente.php');
    exit;

} catch (Exception $e) {
    // Em caso de erro
    session_start();
    $_SESSION['message'] = "Erro ao atualizar cliente: " . $e->getMessage();
    header('Location: cliente.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Atualizar Cliente</title>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <div class="topbar-divider d-none d-sm-block"></div>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Atualizar Cliente</h1>
                    <p><?php echo $_SESSION['message'] ?? ''; ?></p>
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
