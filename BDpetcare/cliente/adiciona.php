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
$sql_cidade=$conn->prepare("SELECT * FROM tb_cidade");
$sql_cidade->execute();
$result_cidade=$sql_cidade->fetchAll();

?>

<body>
<td><a href="cliente.php"><img src="../img/voltar.png" height="50" width="50"></a> </td>
    <form action="adiciona_submit.php" method="post">

        <label for="">Nome:</label>
        <input type="text" name="nm_cliente" placeholder="Nome do Cliente">

        <label for="">CPF</label>
        <input type="number" name="cpf_cliente" id="cpf_cliente" placeholder="CPF do Cliente">

        <label for="">Rua</label>
        <input type="text" name="end_rua" id="end_rua" placeholder="Nome da Rua">


        <label for="">Número Endereço</label>
        <input type="text" name="end_nro" id="end_nro" placeholder="Número Endereço">
    
        <label for="">Bairro</label>
        <input type="text" name="end_bairro" id="end_bairro" placeholder="Nome do Bairro">

            <label for="">Cidade:</label>
        <select name="cidade_id" id="">
            <option value="" selected>Selecione:</option>
            
        <?php 
        foreach($result_cidade as $data) { ?>
            <option value="<?php echo $data['id_cidade'] ?>"><?php echo $data['nm_cidade'] ?></option> 
            <?php } ?>

        </select>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>