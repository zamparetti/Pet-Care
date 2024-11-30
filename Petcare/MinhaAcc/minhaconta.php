<?php

if (!isset($_SESSION)) {
    session_start();
}

include("../Login/acesso.php");
include('../../BDpetcare/config/conecta.php');



$sql=$conn->prepare("SELECT * FROM tb_usuario WHERE id_usuario = :id_user");
$sql->bindParam(':id_user', $_SESSION['id_usuario']);
$sql->execute();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet care</title>
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon"> 
    <link rel="stylesheet" href="acc.css">
</head>
<body>
<header>
    <nav>
        <ul type="none">
            <li id="logo">
            Pet<span>Care</span><span class="heart-icon">🦴</span>
        </li>
            
            <li><a href="http://localhost/PetCareAll/Petcare/home/INDEX2.php">Home</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/SERVICOS/PAG_SERVICOS.php">Produtos</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/Carrinho/carrinho.php">Carrinho</a></li>
            <li><a href="#">Minha Conta</a></li>
            <li><a href="http://localhost/PetCareAll/Petcare/login/logout.php" class="desconectar">Desconectar conta</a></li>
            
        </ul>
    </nav>
</header>
<main>
   
    <section id="intro">
        <h1>Minha conta</h1>
        <h2>Bem-vindo <?php // echo htmlspecialchars($_SESSION['usuario']['nm_usuario']); ?></h2>
    </section>
    <form method="post" action="minhaconta.php">
    <div id="infoP">
        <h1>Informações Pessoais</h1>                      
        <div id="box1">
            <p class="nmCSS">
                <?php 
                echo "Nome: " . $_SESSION['nm_usuario'];
                ?>
            </p>
            <p class="emailCSS">
                <?php 
                echo "Email: " . $_SESSION['email_usuario'];
                ?>
            </p>

        
        </div>                     
    </div>
</main>
<div id="caixafooter"></div>
<footer>       
<p>
Desenvolvido por Isadora Fonseca, Lucas Zamparetti e Guilherme Nunes <br> Copyright &copy; PetCare 2024</p>
</footer>   
</body>
</html>
