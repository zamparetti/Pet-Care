<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<td><a href="usuario.php"><img src="../img/voltar.png" height="50" width="50"></a> </td>
    <form action="adiciona_usuario_submit.php" method="post">

        <label for="">Usuário:</label>
        <input type="text" name="nm_usuario" placeholder="Nome do Usuário">

        <label for="">Email:</label>
        <input type="text" name="email_usuario" placeholder="Email do Usuário">

        <label for="">Login:</label>
        <input type="text" name="login_usuario" placeholder="Login do Usuário">


        <label for="">Senha:</label>
        <input type="text" name="senha_usuario" placeholder="Senha do Usuário">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
