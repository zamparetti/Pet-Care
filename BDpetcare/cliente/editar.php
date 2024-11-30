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
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = $conn->prepare("SELECT c.*, cid.* FROM tb_cliente c LEFT JOIN tb_cidade cid ON cid.id_cidade=c.cidade_id WHERE c.id_cliente=:id_cliente LIMIT 1");
$sql->bindValue(':id_cliente', $id);
$sql->execute();
$result=$sql->fetch();

$sql_cidade = $conn->prepare("SELECT * FROM tb_cidade");
$sql_cidade->execute();
$result_cidade = $sql_cidade->fetchAll();
?>

<body>
    <td><a href="cliente.php"><img src="../img/voltar.png" height="50" width="50"></a></td>
    <form action="editar_submit.php" method="post">

    <label for="">ID</label>        
    <input type="text" name="id_cliente" value="<?php echo $result['id_cliente']?>" disabled>

        <label for="">Nome</label>        
        <input type="text" name="nm_cliente" value="<?php echo $result['nm_cliente']?>">

        <label for="">CPF</label>
        <input type='text' name="cpf_cliente" value='<?php echo $result['cpf_cliente'] ?>'/>

        <label for="">Rua</label>
        <input type='text' name="end_rua" value='<?php echo $result['end_rua'] ?>'/>

        <label for="">Número Endereço</label>
        <input type='text' name="end_nro" value='<?php echo $result['end_nro'] ?>'/>

        <label for="">Bairro</label>
        <input type='text' name="end_bairro" value='<?php echo $result['end_bairro'] ?>'/>

        <label for="">Cidade</label>
       
       <select name="cidade_id" id="">
        <option value="">Selecione</option>

     <?php
       foreach ($result_cidade as $data) { ?>

        <option    <?php if($data['id_cidade']==$result['nm_cidade']  ) { ?> selected <?php  }    ?>        value=" <?php echo $data['id_cidade']?>"> <?php echo $data['nm_cidade']  ?>        </option>

        <?php }
        ?>


       </select>
        <input type="text" name="id_cliente" value="<?php echo $result['id_cliente']?>" hidden>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
