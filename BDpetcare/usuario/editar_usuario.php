<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<?php 


if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
include('../config/conecta.php');
$sql = $conn -> prepare("SELECT * FROM tb_usuario WHERE id_usuario=:id ");
$sql -> bindParam(':id',$id);
$sql -> execute();
$result=$sql->fetch();

?>
<body>
<td><a href="usuario.php"><img src="../img/voltar.png" height="50" width="50"></a> </td>
    <form action="editar_usuario_submit.php" method="post">


        <label for="">Nome Do Usuário:</label>
        <input type="text" name="nm_usuario" value="<?php echo $result['nm_usuario']?>" id="">

        <label for="">Email Do Usuário</label>
        <input type="text" name="email_usuario" value="<?php echo $result['email_usuario']?>" id="">

        <label for="">Login Do Usuário:</label>
        <input type="text" name="login_usuario" value="<?php echo $result['login_usuario']?>" id="">

        <label for="">Senha Do Usuário:</label>
        <input type="text" name="senha_usuario" value="<?php echo $result['senha_usuario']?>" id="">


        <input type="hidden" name="id_usuario" value="<?php echo $result['id_usuario']?>" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>