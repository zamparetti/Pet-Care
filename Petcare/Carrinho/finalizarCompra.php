<?php
include('../Login/acesso.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Forma de Pagamento</title>
    <link rel="stylesheet" href="estiloF.css">
</head>
<body>
        <li id="logo">
            Pet<span>Care</span><span class="heart-icon">🦴</span>
        </li>
    <div class="container">
        <h1>Escolha a Forma de Pagamento</h1>
        <div class="payment-options">
            <div class="payment-method">
                <input type="radio" id="credit" name="payment" value="credit" checked>
                <label for="credit">Cartão de Crédito</label>
            </div>
            <div class="payment-method">
                <input type="radio" id="boleto" name="payment" value="boleto">
                <label for="boleto">Boleto Bancário</label>
            </div>
            <div class="payment-method">
                <input type="radio" id="paypal" name="payment" value="paypal">
                <label for="paypal">PayPal</label>
            </div>
        </div>

        <div class="parcelamento">
            <label for="parcelas">Parcelar em:</label>
            <select id="parcelas" name="parcelas">
                <option value="1">1x sem juros</option>
                <option value="2">2x</option>
                <option value="3">3x</option>
                <option value="4">4x</option>
                <option value="5">5x</option>
                <option value="6">6x</option>
                <option value="12">12x</option>
            </select>
        </div>

        <button class="confirmar-btn">Confirmar Pagamento</button>
        <a href="http://localhost/PetCareAll/Petcare/Carrinho/carrinho.php" class="voltar-btn">Voltar</a>
    </div>

</body>
</html>
