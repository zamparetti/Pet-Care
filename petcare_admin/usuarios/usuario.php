<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PetCare Admin - Usuários</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
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
                    <a href="http://localhost/PetCareAll/Petcare/HOME/INDEX2.php" class="nav-link">Voltar ao site</a>
                    <a href="http://localhost/PetCareAll/Relatorio/PaginaRelatorios/pgrelatorios.php" class="nav-link">Relatórios</a>
                </a>
            </li>
            <div class="text-center d-none d-md-inline">
                <hr class="sidebar-divider">
                <div class="sidebar-heading">Gerenciamento Tabelas</div>
                <li class="nav-item">
                    <a class="nav-link" href="../produtos/produto.php">
                        <i class="fas fa-box fa-2x text-gray-300"></i>
                        <span>Produtos</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../cidades/cidade.php">
                        <i class="fas fa-city fa-2x text-gray-300"></i>
                        <span>Cidades</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../estados/estado.php">
                        <i class="fas fa-map fa-2x text-gray-300"></i>
                        <span>Estados</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../clientes/cliente.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../fornecedores/fornecedor.php">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        <span>Fornecedores</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../grupos/grupo.php">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                        <span>Grupos</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../naturezas/natureza.php">
                        <i class="fas fa-leaf fa-2x text-gray-300"></i>
                        <span>Naturezas</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../regioes/regiao.php">
                        <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        <span>Regiões</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link" href="../unidades/unidade.php">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                        <span>Unidades</span>
                    </a>
                </li>

                 <hr class="sidebar-divider d-none d-md-block">

                 <li class="nav-item">
                <a class="nav-link" href="../emitentes/emitente.php">
                    <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                    <span>Emitentes</span>
                </a>
            </li>

             <hr class="sidebar-divider d-none d-md-block">

                 <li class="nav-item">
                <a class="nav-link" href="../vendedores/vendedor.php">
                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    <span>Vendedores</span>
                </a>
            </li>

                <hr class="sidebar-divider d-none d-md-block">

                 <li class="nav-item">
                <a class="nav-link" href="../vendas/venda.php">
                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    <span>Vendas</span>
                </a>
            </li>
                        <hr class="sidebar-divider d-none d-md-block">

                    <li class="nav-item">
                    <a class="nav-link" href="../compras/compra.php">
                        <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                        <span>Compras</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item">
                    <a class="nav-link" href="../formapgto/formapgto.php">
                        <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        <span>Formas Pagamento</span>
                    </a>
                </li>

                     <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item">
                    <a class="nav-link" href="../comprador/comprador.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Comprador</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item">
                    <a class="nav-link" href="usuario.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Usuarios</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['message']; ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <h1 class="h3 mb-2 text-gray-800">Gerenciamento de Usuários</h1>

                    <!-- Formulário de busca -->
                    <form action="" method="post" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="busca" class="form-control" placeholder="Insira o nome ou o login do usuário" aria-label="Buscar Usuário">
                            <div class="input-group-append">
                                <input type="submit" value="Buscar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                    <!-- Novo Usuário -->
                    <a href="adiciona_usuario.php" class="btn btn-success mb-3">Novo Usuário</a>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Login</th>
                                            <th>Senha</th>
                                            <th colspan="2" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM tb_usuario");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();

                                        if (!empty($_POST['busca'])) {
                                            $sql = $conn->prepare("SELECT * FROM tb_usuario WHERE nm_usuario LIKE :buscar OR login_usuario LIKE :buscar OR senha_usuario LIKE :buscar OR email_usuario LIKE :buscar");
                                            $buscar = "%" . $_POST['busca'] . "%";
                                            $sql->bindParam(":buscar", $buscar);
                                            $sql->execute();
                                            $result = $sql->fetchAll();
                                        }

                                        foreach ($result as $linha) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($linha['id_usuario']) . "</td>";
                                            echo "<td>" . htmlspecialchars($linha['nm_usuario']) . "</td>";
                                            echo "<td>" . htmlspecialchars($linha['email_usuario']) . "</td>";
                                            echo "<td>" . htmlspecialchars($linha['login_usuario']) . "</td>";
                                            echo "<td>" . htmlspecialchars($linha['senha_usuario']) . "</td>";
                                            echo "<td class='text-center'><a href='editar_usuario.php?id=" . htmlspecialchars($linha['id_usuario']) . "' class='btn btn-warning'>Editar</a></td>";
                                            echo "<td class='text-center'><a href='excluir.php?id=" . htmlspecialchars($linha['id_usuario']) . "' class='btn btn-danger' onclick='return confirm(\"Deseja realmente excluir?\");'>Excluir</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PetCare 2024</span>
                    </div>
                </div>
            </footer>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</body>
</html>
