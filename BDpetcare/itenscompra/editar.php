<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT i.,c.,p.* FROM tb_itenscompra i LEFT JOIN tb_compra c 
    ON c.id_compra=i.compra_id=:id LEFT JOIN tb_produto p on p.id_produto=i.produto_id=:id
    WHERE i.id_itenscompra=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
 

    $sql_compra=$conn->prepare("SELECT * FROM tb_compra");
    $sql_compra->execute();
    $result_compra=$sql_compra->fetchAll();
    $sql_produto=$conn->prepare("SELECT * FROM tb_produto");
    $sql_produto->execute();
    $result_produto=$sql_produto->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_itenscompra" id="id_itenscompra" value=" <?php echo $result['id_itenscompra']?> " disabled>
        <label for="">Quantidade de itens comprados</label>
        <input type="text" name="qtd_itenscompra" id="qtd_itenscompra" value=" <?php echo $result['qtd_itenscompra']?> ">
        <label for="">Preço Unitário</label>
        <input type="text" name="pr_unitario" id="pr_unitario" value=" <?php echo $result['pr_unitario']?> ">
        

        <label for="">Compra</label>
        <select name="compra_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_compra as $data) { ?>

    <option <?php  if($data['id_compra']==$result['compra_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_compra'] ?>  ">  <?php echo $data['data_compra'] ?> </option> 

    <?php 
  }
    ?>
    
    </select>
<label for="">Produto</label>
<select name="produto_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_produto as $data) { ?>

    <option <?php  if($data['id_produto']==$result['produto_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_produto'] ?>  ">  <?php echo $data['nm_produto'] ?> </option> 

    <?php 
  }
    ?>

    </select>
    
    </form>

    <a href="itenscompra.php">Voltar</a>

    <?php
}
?>