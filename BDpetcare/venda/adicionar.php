<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_vendedor=$conn->prepare("SELECT * FROM tb_vendedor");
$sql_vendedor->execute();
$result_vendedor=$sql_vendedor->fetchAll();
$sql_cliente=$conn->prepare("SELECT * FROM tb_cliente");
$sql_cliente->execute();
$result_cliente=$sql_cliente->fetchAll();
$sql_natureza=$conn->prepare("SELECT * FROM tb_natureza");
$sql_natureza->execute();
$result_natureza=$sql_natureza->fetchAll();
?>
<body>

  <form action="adicionar_submit.php" method="POST">
    <label for="">Data da Venda:</label>
    <input type="text" name="dt_venda" id="dt_venda" placeholder="Data" required> 

    <label for="">Nome do vendedor:</label>
    <select name="vendedor_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_vendedor as $data) { ?>
    <option value=" <?php echo $data ['id_vendedor'] ?>  ">  <?php echo $data['nm_vendedor'] ?> </option> 
    <?php 
  }
    ?>
 </select>
    
<label for="">Nome do cliente:</label>
<select name="cliente_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_cliente as $data) { ?>

    <option value=" <?php echo $data ['id_cliente'] ?>  ">  <?php echo $data['nm_cliente'] ?> </option> 
    <?php 
      }
      ?>
    
 
   
  </select>

  </select>
    
<label for="">Natureza:</label>
<select name="natureza_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_natureza as $data) { ?>

    <option value=" <?php echo $data ['id_natureza'] ?>  ">  <?php echo $data['nm_natureza'] ?> </option> 
    <?php 
      }
      ?>
    
 
   
  </select>

  <input type="submit" value="Enviar"> 
  </form>    
</body>
</html> 