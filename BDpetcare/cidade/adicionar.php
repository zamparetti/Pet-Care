<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_estado=$conn->prepare("SELECT * FROM tb_estado");
$sql_estado->execute();
$result_estado=$sql_estado->fetchAll();
?>
<body>
  
  <form action="adicionar_submit.php" method="POST">
    <label for="">Cidade:</label>
    <input type="text" name="nm_cidade" id="nm_cidade" placeholder="Nome da cidade" required>
    <label for="">Estado:</label>
    <select name="estado_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_estado as $data) { ?>

    <option value=" <?php echo $data ['id_estado'] ?>  ">  <?php echo $data['nome'] ?> </option> 
    <?php 
  }
    ?>

    </select>
    <input type="submit" value="Enviar">

  </form>    
</body>
</html>