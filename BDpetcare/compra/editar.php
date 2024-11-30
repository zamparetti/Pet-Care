<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT c.*,f.* FROM tb_compra c LEFT JOIN tb_fornecedor f 
    ON f.id_fornecedor=c.fornecedor_id=:id
    WHERE c.id_compra=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_fornecedor=$conn->prepare("SELECT * FROM tb_fornecedor");
    $sql_fornecedor->execute();
    $result_fornecedor=$sql_fornecedor->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_compra" id="id_compra" value=" <?php echo $result['id_compra']?> " disabled>
        <label for="">Data de compra</label>
        <input type="text" name="data_compra" id="data_compra" value=" <?php echo $result['data_compra']?> ">
        <label for="">Fornecedor</label>

        
        <select name="fornecedor_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_fornecedor as $data) { ?>

    <option <?php  if($data['id_fornecedor']==$result['fornecedor_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_fornecedor'] ?>  ">  <?php echo $data['nm_fornecedor'] ?> </option> 

    <?php 
  }
    ?>

    </select>
        
        <input type="hidden" name="id_compra" id="id_compra" value=" <?php echo $result['id_compra']?> " >
        <input type="submit" value="Enviar">
    </form>

    <a href="compra.php">Voltar</a>

    <?php
}
?>