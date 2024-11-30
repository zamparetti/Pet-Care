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
$sql = $conn -> prepare("SELECT * FROM tb_natureza WHERE id_natureza=:id ");
$sql -> bindParam(':id',$id);
$sql -> execute();
$result=$sql->fetch();

?>
<body>
<td><a href="natureza.php"><img src="../img/voltar.png" height="50" width="50"></a> </td>
    <form action="editar_natureza_submit.php" method="post">
        <label for="">ID:</label>
        <input type="text" name="id_natureza" value="<?php echo $result['id_natureza']?>" id="" disabled>
        <label for="">Nome Região:</label>
        <input type="text" name="nm_natureza" value="<?php echo $result['nm_natureza']?>" id="">
        <input type="hidden" name="id_natureza" value="<?php echo $result['id_natureza']?>" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>