<?php
    include('../Login/acesso.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon">

    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<!--Cabeçalho-->
<header>
<nav>
<li id="logo">
            Pet<span>Care</span><span class="heart-icon">🦴</span>
        </li>
        
    <ul type="none">
        
                <li><a href="#" >Home</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/SERVICOS/PAG_SERVICOS.php">Produtos</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/Carrinho/carrinho.php">Carrinho</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/MinhaAcc/minhaconta.php">Minha Conta</a></li>
                <li><a href="http://localhost/PetCareAll/Petcare/login/logout.php" class="desconectar">Desconectar conta</a></li>
    </ul>
</nav>
</header>
<!--Corpo do site-->
<main>
    <section id="intro">
        <h1>Pet Care</h1>
    </section>
    <div id="caoegato">
        <h1>Produtos focados para cães e gatos</h1>
        <div id="box1"></div>
        <div id="box2"></div>
    </div>
    <div id="produtos">
        <h1>Tudo que seu pet merece!</h1>
        <div id="box3"></div>
        <div id="box4"></div>
        <div id="box5"></div>
        <div id="box6"></div>
    </div>
    <div id="pai">
        <h1>Cuide do seu pet da melhor maneira!</h1>
        <div id="box7"></div>
        <div id="box8"></div>
    </div>
</main>
<!--Rodapé-->
<div id="caixafooter"></div>
<footer>
<p>
Desenvolvido por Isadora Fonseca, Lucas Zamparetti e Guilherme Nunes <br> Copyright &copy; PetCare 2024</p>
</footer>
</body>
</html>
