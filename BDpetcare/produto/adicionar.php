<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_grupo=$conn->prepare("SELECT * FROM tb_grupo");
$sql_grupo->execute();
$result_grupo=$sql_grupo->fetchAll();
$sql_unidade=$conn->prepare("SELECT * FROM tb_unidade");
$sql_unidade->execute();
$result_unidade=$sql_unidade->fetchAll();
?>
<body>

  <form action="adicionar_submit.php" method="POST">
    <label for="">Produto:</label>
    <input type="text" name="nm_produto" id="nm_produto" placeholder="Nome do produto" required>        
    <label for="">Unidade:</label>
    <select name="unidade_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_unidade as $data) { ?>
    <option value=" <?php echo $data ['id_unidade'] ?>  ">  <?php echo $data['nm_unidade'] ?> </option> 
    <?php 
  }
    ?>
     </select>
     <label for="">Grupo:</label>
<select name="grupo_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_grupo as $data) { ?>

    <option value=" <?php echo $data ['id_grupo'] ?>  ">  <?php echo $data['nm_grupo'] ?> </option> 
    <?php 
      }
      ?>
    
      
     

  </select>

  <label for="">Preço Venda:</label>
<input type="text" name="preco_venda" id="preco_venda" placeholder="Preço da venda" required>        
<label for="">Preço Compra:</label>
    <input type="text" name="preco_compra" id="preco_compra" placeholder="Preço da compra" required> 
    <label for="">Quandidade Estoque:</label>
    <input type="text" name="qtd_estoque" id="qtd_estoque" placeholder="qtd_estoque" required> 
    <label for="">Foto do Produto:</label>
    <input type="text" name="nm_foto" id="nm_foto" placeholder="Caminho da foto" required>  
    <label for="">Sequência:</label>
    <input type="text" name="sequencia" id="sequencia" placeholder="Digite a posição do seu produto" required>   
    <input type="submit" value="Enviar">

  </form>    
</body>
</html>