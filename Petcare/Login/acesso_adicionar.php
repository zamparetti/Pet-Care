<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro PetCare</title>
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon">
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<?php 

include('../../BDpetcare/config/conecta.php')


?>

<div class="wrapper">

        <div class="navbar">
            <a href="http://localhost/PetCareAll/Petcare/Login/login.php">← Voltar</a>
            <div class="logo">
                Pet<span>Care</span><span class="heart-icon">🦴</span>
            </div>
        </div>

        <form action="acesso_adicionar_submit.php" method="post">


            <h1>Bem-vindo!🐶❤️</h1>


            <div class="input-box">
            <input type="text" name="nm_usuario" id="nm_usuario" placeholder=" Nome do Usuário" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
            <input type="text" name="login_usuario" id="login_usuario" placeholder=" Usuário" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
            <input type="text" name="email_usuario" id="email_usuario" placeholder="Email do Usuário" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
            <input type="text" name="senha_usuario" id="senha_usuario" placeholder="Senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

           <button type="submit" class="btn">Cadastrar</button>

       

        

        </form>


    </div>
    