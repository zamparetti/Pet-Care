<?php 
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) {
    echo '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Negado </title>
    <link rel="shortcut icon" href="../imagen/logozinha.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMMyE93bNcuO2oZ3oWmr4V/U5z6W1uEC1Ecg7v3" crossorigin="anonymous">
   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #789DBC;
    }

    .container {
        width: 90%;
        max-width: 720px;
        text-align: center;
        background: rgba(255, 255, 255, 0.2);
        background-color: white;
        padding: 2rem;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
    }

    h1 {
        color: red;
        font-size: 2rem;
        letter-spacing: 1px;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    a {
        display: inline-block;
        margin-top: 1rem;
        text-decoration: none;
        color: #007bff;
        font-size: 1.2rem;
        letter-spacing: 1px;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #4634d8;
        text-decoration: underline;
    }

    .imgacesso {
        border-radius: 30px;
        box-shadow: 8px 8px 15px 5px rgba(0, 0, 0, 0.3);
        margin-top: -1rem;
        width: 85%;
    }

    /* Media queries */
    @media (max-width: 768px) {
        h1 {
            font-size: 1.5rem;
        }

        a {
            font-size: 1rem;
        }

        .container {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 1.2rem;
        }

        a {
            font-size: 0.9rem;
        }

        .container {
            padding: 1rem;
        }

        .imgacesso {
            max-width: 250px; /* Limitar tamanho da imagem em dispositivos menores */
        }
    }
       
</style>

    </head>
    <body>
        <div class="container">
            <h1><i class="fas fa-exclamation-triangle"></i> Conecte sua conta primeiro!</h1> <br> 
            <a href="http://localhost/PetCareAll/Petcare/Login/login.php">Voltar para a página de login</a>
            <br> <br> <br> <br> 
              <img src="../imagen/logozinha.png" alt="" class="imgacesso">
        </div>
    </body>
    </html>';
    exit();
}

if ($_SESSION['login'] == 'adm' && $_SESSION['senha'] == 'admpetcare123') {
    
    echo '<a href="http://localhost/PetCareAll/petcare_admin/" style="color: black;  display: inline;
    padding: 15px 25px;   color: #789DBC;
    text-decoration: none;
    transition: background .7s;
    font-size: 13px; 
    top: 1%;
    left: 71%;
    position: absolute;

     class="entrarADM">Painel ADM</a>';
}
?>
