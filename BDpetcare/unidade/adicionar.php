<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
  
    <form action="adicionar_submit.php" method="post">
    <input type="text" name="nm_unidade" id="nm_unidade" placeholder="Nome da unidade" required>   
    <input type="text" name="sigla_unidade" id="sigla_unidade" placeholder="Sigla" required maxlength="2">
    <input type="submit" value="Enviar">
    </form>
</body>
</html>