<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_venda=$conn->prepare("SELECT * FROM tb_venda");
$sql_venda->execute();
$result_venda=$sql_venda->fetchAll();
$sql_produto=$conn->prepare("SELECT * FROM tb_produto");
$sql_produto->execute();
$result_produto=$sql_produto->fetchAll();
?>
<body>

  <form action="adicionar_submit.php" method="POST">
    <label for="">produto:</label>
    <select name="produto_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_produto as $data) { ?>
    <option value=" <?php echo $data ['id_produto'] ?>  ">  <?php echo $data['nm_produto'] ?> </option> 
    <?php 
  }
    ?>
     </select>
     <label for="">Data da venda:</label>
<select name="venda_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_venda as $data) { ?>

    <option value=" <?php echo $data ['venda_id'] ?>  ">  <?php echo $data['dt_venda'] ?> </option> 
    <?php 
      }

      ?>
    
      
     

  </select>

  <label for="">Quantidade de itens vendidos:</label>
    <input type="text" name="qtd_itensvenda" id="qtd_itensvenda" placeholder="Quantidade de itens vendidos" required>        

    <input type="submit" value="Enviar">

  </form>    
</body>
</html>