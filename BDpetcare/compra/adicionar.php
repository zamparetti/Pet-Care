<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_fornecedor=$conn->prepare("SELECT * FROM tb_fornecedor");
$sql_fornecedor->execute();
$result_fornecedor=$sql_fornecedor->fetchAll();
?>
<body>
  
  <form action="adicionar_submit.php" method="POST">
    <label for="">Data da compra:</label>
    <input type="text" name="data_compra" id="data_compra" placeholder="Data da compra" required>

    <label for="">Fornecedor:</label>
    <select name="fornecedor_id" id="">
      <option value="" selected>Selecione</option>

      <?php foreach ($result_fornecedor as $data) { ?>

    <option value=" <?php echo $data ['id_fornecedor'] ?>  ">  <?php echo $data['nm_fornecedor'] ?> </option> 
    <?php 
  }
    ?>

    </select>
     
    <input type="submit" value="Enviar">

  </form>    
</body>
</html>