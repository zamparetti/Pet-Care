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

<?php

include('../config/conecta.php');

$stmt = $conn -> prepare("SELECT * FROM tb_usuario");
$stmt -> execute();
$result=$stmt->fetchAll();

?>

<form action="" method="post">
    <input type="text" name="busca" id="" placeholder="Insira o Usuário">
    <input type="submit" value="Buscar">
</form>

<?php
if (!empty($_POST['busca'])) {
$sql=$conn->prepare("SELECT * FROM tb_usuario WHERE nm_usuario LIKE :buscar OR login_usuario LIKE :buscar OR senha_usuario LIKE :buscar OR email_usuario LIKE :buscar");
$buscar="%".$_POST['busca'] . "%";
$sql->bindParam(":buscar",$buscar);
$sql->execute();
$result=$sql->fetchAll();
}
?>

<a href="adiciona_usuario.php"><img src="../img/adicionar.png" height="50" width="50"></a>
<table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Login</th>
            <th>Senha</th>
            <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($result as $linha) {
                echo "<tr>";  
                echo "<td>".$linha['id_usuario'] ." </td>";
                echo "<td>".$linha['nm_usuario'] ." </td>";
                echo "<td>".$linha['email_usuario'] ." </td>";
                echo "<td>".$linha['login_usuario'] ." </td>"; 
                echo "<td>".$linha['senha_usuario'] ." </td>"; 
        ?>
                <td> <a href="editar_usuario.php?id=<?php echo $linha['id_usuario']?>"><img src="../img/editar.png" height="25" width="25"></a> </td>
                <td> <a href="excluir.php?id=<?php echo $linha['id_usuario']?>"><img src="../img/excluir.png" height="25" width="25" onclick='return confirm("Deseja Realmente Excluir?")'></a></td>
                
                <?php
                echo "</tr>";
            }
                ?>
        </tbody>
            
        
    </table>
</body>
</html>