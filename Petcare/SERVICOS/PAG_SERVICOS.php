
<?php
include("../Login/acesso.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet care</title>
    <link rel="stylesheet" href="estilo1.css">
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    
</head>

<?php

include ('conecta.php');

$sql=$conn->prepare("SELECT p.*, g.*, u.* FROM tb_produto p LEFT JOIN tb_grupo g ON g.id_grupo=p.grupo_id
LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id ORDER BY sequencia ASC");
$sql->execute();
$result=$sql->fetchAll();
?>

<body>
<!--Cabeçalho-->
<header>
        <nav>
            <ul type="none">
            <li id="logo">
            Pet<span>Care</span><span class="heart-icon">🦴</span>
        </li>
                <li><a href="../HOME/INDEX2.php" >Home</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/Carrinho/carrinho.php">Carrinho</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/MinhaAcc/minhaconta.php">Minha Conta</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/login/logout.php" class="desconectar">Desconectar conta</a></li>
               <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Digite o produto desejado    🔍" class="busca">
        <input type="submit" value="Filtrar" hidden>
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT p.*,u.*,g.* FROM tb_produto p LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id LEFT JOIN tb_grupo g on g.id_grupo= p.grupo_id WHERE p.nm_produto
    LIKE :buscar");
    $sql->bindParam(':buscar',$buscar);
    $sql-> execute();
    $result=$sql->fetchAll();
   
}

?>
            </ul>
        </nav>
    </header> 




<div class="container-pai">
        <div class="container-carrossel">  </div>

       

   <?php

    foreach($result as $data) { ?>
    <div class="card">

<img decoding="async" src="
<?php 
echo $data ['nm_foto'];
?>
" alt="Imagem de exemplo">
        
        <p>
        <?php

            

               echo $data['nm_produto'];
            
            
        ?>
        </p>

            
        <h2 class="sigla">
        <?php

               echo $data['sigla_unidade'];
           
        ?>
        </h2>


        <h2>
        <?php

            

                echo "R$ " . $data['preco_venda'];
               

          
        ?>
        </h2>
        
        <div class="link1">
        <div class="link1">
        <a href="http://localhost/PetCareAll/Petcare/Carrinho/carrinho.php?add=carrinho&id=<?php echo $data['id_produto']; ?>">
        <button style="cursor: pointer;">COMPRAR</button>
    </a>
</div>

        </div>
    </div>
<?php
    }
    ?>
    </div>
    <div id="caixafooter"></div>
<footer>
<p>
Desenvolvido por Isadora Fonseca, Lucas Zamparetti e Guilherme Nunes <br> Copyright &copy; PetCare 2024</p>
</footer>
</body>
</html>
