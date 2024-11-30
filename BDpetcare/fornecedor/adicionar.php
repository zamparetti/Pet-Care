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
    <label for="">Fornecedor:</label>
    <input type="text" name="nm_fornecedor" id="nm_fornecedor" placeholder="Nome do Fornecedor" required>
    <label for="">Cidade:</label>
    <select name="cidade_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_cidade as $data) { ?>

    <option value=" <?php echo $data ['id_cidade'] ?>  ">  <?php echo $data['nm_cidade'] ?> </option> 
    <?php 
  }
    ?>  </select>

     <label for=""> CPF: </label>
     <input type="text" name="cpf_fornecedor" id="cpf_fornecedor" placeholder="CPF do Fornecedor" required>
     <label for="">Email:</label>
     <input type="text" name="email_fornecedor" id="email_fornecedor" placeholder="Email do Fornecedor" required>
     <label for="">CNPJ:</label>
     <input type="text" name="cnpj_fornecedor" id="cnpj_fornecedor" placeholder="CNPJ do Fornecedor" required>
     <label for="">Telefone:</label>
     <input type="text" name="telefone_fornecedor" id="telefone_fornecedor" placeholder="Telefone do Fornecedor" required>


  
    <input type="submit" value="Enviar">

  </form>    
</body>
</html>