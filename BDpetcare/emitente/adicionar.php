<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_cidade=$conn->prepare("SELECT * FROM tb_cidade");
$sql_cidade->execute();
$result_cidade=$sql_cidade->fetchAll();
?>
<body>
  
  <form action="adicionar_submit.php" method="POST">
    <label for="">Nome:</label>
    <input type="text" name="nm_emitente" id="nm_emitente" placeholder="Nome do Emitente" required>
    <label for="">Cidade:</label>
    <select name="cidade_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_cidade as $data) { ?>

    <option value=" <?php echo $data ['id_cidade'] ?>  ">  <?php echo $data['nm_cidade'] ?> </option> 
    <?php 
  }
    ?>

    </select>
    <label for="">CNPJ:</label>
    <input type="text" name="cnpj_emitente" id="cnpj_emitente" placeholder="Cnpj do Emitente" required>
    <label for="">Rua:</label>
    <input type="text" name="end_rua" id="end_rua" placeholder="Nome da rua" required>
    
    <label for="">N.º da Casa:</label>
    <input type="text" name=" end_nro" id=" end_nro" placeholder="Numero da casa" required>
    <label for="">Bairro:</label>
    <input type="text" name="end_bairro" id="end_bairro" placeholder="Nome do bairro" required>

    <input type="submit" value="Enviar">

  </form>    
</body>
</html>