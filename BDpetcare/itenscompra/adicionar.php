<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_compra=$conn->prepare("SELECT * FROM tb_compra");
$sql_compra->execute();
$result_compra=$sql_compra->fetchAll();
$sql_produto=$conn->prepare("SELECT * FROM tb_produto");
$sql_produto->execute();
$result_produto=$sql_produto->fetchAll();
?>
<body>

  <form action="adicionar_submit.php" method="POST">
    <label for="">Quantidade de itens comprados:</label>
    <input type="text" name="qtd_itenscompra" id="qtd_itenscompra" placeholder="Quantidade" required> 

    <label for="">Preço Unitário:</label>
    <input type="text" name="pr_unitario" id="pr_unitario" placeholder="Preço Unitário" required> 
    

    
    <label for="">Data da compra:</label>
    <select name="compra_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_compra as $data) { ?>
    <option value=" <?php echo $data ['id_compra'] ?>  ">  <?php echo $data['data_compra'] ?> </option> 
    <?php 
  }
    ?>
 </select>
    
<label for="">Produto:</label>
<select name="produto_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_produto as $data) { ?>

    <option value=" <?php echo $data ['id_produto'] ?>  ">  <?php echo $data['nm_produto'] ?> </option> 
    <?php 
      }
      ?>
    
 
   
  </select>

  <input type="submit" value="Enviar"> 
  </form>    
</body>
</html> 