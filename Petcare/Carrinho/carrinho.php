<?php
include("../Login/acesso.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet care</title>
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon"> 
    <link rel="stylesheet" href="estiloC.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li id="logo">
                Pet<span>Care</span><span class="heart-icon">🦴</span>
            </li>
            <li><a href="http://localhost/PetCareAll/Petcare/home/INDEX2.php">Home</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/SERVICOS/PAG_SERVICOS.php">Produtos</a></li>
            <li><a href="#">Carrinho</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/MinhaAcc/minhaconta.php">Minha Conta</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/login/logout.php" class="desconectar">Desconectar conta</a></li>
        </ul>
    </nav>
</header>
<main>
    <div id="informacao">
        <p><strong>Verifique se os produtos estão selecionados corretamente</strong></p>  
    </div> 

    <form method="post" action="minhaconta.php">
        <div id="infoP">
            <h1>Seu carrinho 🛒</h1>  
            
            <div class="container-pai">
                <div class="container-carrossel">                      
                    <div id="box1">
                        <div class="carrinho">
                            <?php
                            require('config/conecta.php');

                            if (!isset($_SESSION['itens'])) {
                                $_SESSION['itens'] = array();
                            }

                            if (isset($_GET['add']) && $_GET['add'] == "carrinho" && isset($_GET['id'])) {
                                $id_produto = $_GET['id'];

                                if (!isset($_SESSION['itens'][$id_produto])) {
                                    $_SESSION['itens'][$id_produto] = 1;
                                } else {
                                    $_SESSION['itens'][$id_produto] += 1;
                                }

                                header("Location: carrinho.php");
                                exit;
                            }

                            if (count($_SESSION['itens']) == 0) {
                                echo '<div class="carrinho-vazio">';
                                echo '<p>Carrinho Vazio</p>';
                                echo '<a href="http://localhost/PetCareAll/Petcare/SERVICOS/PAG_SERVICOS.php" class="comprar-link">Comprar</a>';
                                echo '</div>';
                            } else {
                                $_SESSION['dados'] = array();

                                foreach ($_SESSION['itens'] as $id_produto => $qtidade) {
                                    $sql = $conn->prepare("SELECT p.*, g.*, u.* FROM tb_produto p
                                                       LEFT JOIN tb_grupo g ON g.id_grupo = p.grupo_id
                                                       LEFT JOIN tb_unidade u ON u.id_unidade = p.unidade_id
                                                       WHERE p.id_produto = :id_produto");
                                    $sql->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
                                    $sql->execute();
                                    $produtos = $sql->fetchAll();

                                    if (count($produtos) > 0) {
                                        $total = $qtidade * $produtos[0]['preco_venda'];

                                        echo '<div class="produto-card">';
                                        echo '<p class="produto-nome">' . $produtos[0]['nm_produto'] . '</p>';
                                        echo '<p class="produto-preco">R$' . number_format($produtos[0]['preco_venda'], 2, ',', '.') . '</p>';
                                        echo '<p class="produto-quantidade">Quantidade: ' . $qtidade . '</p>';
                                        echo '<p class="produto-total">Total: R$' . number_format($total, 2, ',', '.') . '</p>';

                                        echo '<div class="acoes-produto">';
                                        echo '<a href="remover.php?remover=carrinho&id=' . $produtos[0]['id_produto'] . '" class="acao-link">Remover</a>';
                                        echo '<a href="finalizarCompra.php" class="acao-link">Finalizar Pedido</a>';
                                        echo '</div>';
                                        echo '</div>';

                                        array_push(
                                            $_SESSION['dados'],
                                            array(
                                                'id_produto' => $id_produto,
                                                'quantidade' => $qtidade,
                                                'preco_unitario' => $produtos[0]['preco_venda'],
                                                'total' => $total
                                            )
                                        );
                                    } else {
                                        echo '<p>Produto não encontrado!</p>';
                                    }
                                }
                            }
                            ?>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<div id="caixafooter"></div>
<footer>       
    <p>
        Desenvolvido por Isadora Fonseca, Lucas Zamparetti e Guilherme Nunes <br> Copyright &copy; PetCare 2024
    </p>
</footer>   
</body>
</html>
