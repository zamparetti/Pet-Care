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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PetCare Admin - Produtos</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="http://localhost/PetCareAll/Petcare/HOME/INDEX2.php" class="nav-link">Voltar ao site</a>
                <a href="http://localhost/PetCareAll/Relatorio/PaginaRelatorios/pgrelatorios.php" class="nav-link">Relatórios</a>
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
                    <a class="nav-link" href="formapgto.php">
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
                    <a class="nav-link" href="../usuarios/usuario.php">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Gerenciamento de Produtos</h1>

                    <?php if (isset($_SESSION['mensagem'])): ?>
                    <div class="alert alert-success">
                        <?php echo htmlspecialchars($_SESSION['mensagem']); ?>
                    </div>
                    <?php unset($_SESSION['mensagem']); ?>
                    <?php endif; ?>

                    <!-- Filtro de busca -->
                    <form action="" method="post" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="busca" id="busca" class="form-control" placeholder="Nome, grupo ou unidade">
                            <div class="input-group-append">
                                <input type="submit" value="Buscar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                    <a href="adicionar.php" class="btn btn-success mb-3">Adicionar Novo Produto</a>

                    <!-- Tabela de produtos -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Grupo</th>
                                    <th>Unidade</th>
                                    <th>Preço Venda</th>
                                    <th>Preço Compra</th>
                                    <th>Quantidade Estoque</th>
                                    <th>Foto Produto</th>
                                    <th>Sequencia</th>
                                    <th colspan="3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $conn->prepare("SELECT p.*,u.*,g.* FROM tb_produto p LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id LEFT JOIN tb_grupo g ON g.id_grupo=p.grupo_id ORDER BY sequencia ASC LIMIT 30");
                                $sql->execute();
                                $result = $sql->fetchAll();

                                if (!empty($_POST['busca'])) {
                                    $buscar = "%" . $_POST['busca'] . "%";
                                    $sql = $conn->prepare("SELECT p.*,u.*,g.* FROM tb_produto p LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id LEFT JOIN tb_grupo g ON g.id_grupo=p.grupo_id WHERE p.nm_produto LIKE :buscar OR u.nm_unidade LIKE :buscar OR u.sigla_unidade LIKE :buscar OR g.nm_grupo LIKE :buscar OR p.sequencia LIKE :buscar OR p.preco_venda LIKE :buscar OR p.preco_compra LIKE :buscar");
                                    $sql->bindParam(':buscar', $buscar);
                                    $sql->execute();
                                    $result = $sql->fetchAll();
                                }

                                foreach ($result as $linha) {
                                    echo "<tr>";
                                    echo "<td>" . $linha['id_produto'] . "</td>";
                                    echo "<td>" . $linha['nm_produto'] . "</td>";
                                    echo "<td>" . $linha['nm_grupo'] . "</td>";
                                    echo "<td>" . $linha['nm_unidade'] . "</td>";
                                    echo "<td>" . $linha['preco_venda'] . "</td>";
                                    echo "<td>" . $linha['preco_compra'] . "</td>";
                                    echo "<td>" . $linha['qtd_estoque'] . "</td>";
                                    echo "<td>" . $linha['nm_foto'] . "</td>";
                                    echo "<td>" . $linha['sequencia'] . "</td>";
                                    echo "<td><a href='editar.php?id=" . $linha['id_produto'] . "' class='btn btn-warning btn-sm'>Editar</a></td>";
                                    echo "<td><a href='excluir.php?id=" . $linha['id_produto'] . "' class='btn btn-danger btn-sm'>Excluir</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; PetCare Admin 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

</html>
