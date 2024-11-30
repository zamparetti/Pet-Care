<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_regiao=$conn->prepare("SELECT * FROM tb_regiao");
$sql_regiao->execute();
$result_regiao=$sql_regiao->fetchAll();
?>
<body>
        <form action="adicionar_submit.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="Nome do Estado" required>
        <input type="text" name="uf" id="uf" placeholder="UF" required maxlength="2">
        <label for="">Região:</label>
    <select name="regiao_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_regiao as $data) { ?>

    <option value=" <?php echo $data ['id_regiao'] ?>  ">  <?php echo $data['nm_regiao'] ?> </option> 
    <?php 
  }
    ?>

    </select>
        <input type="submit" value="Enviar"> 
 
</body>
</html>