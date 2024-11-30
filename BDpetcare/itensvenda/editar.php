<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT i.*,v.*,p.* FROM tb_itensvenda i LEFT JOIN tb_venda v 
    ON v.id=i.venda_id=:id LEFT JOIN tb_produto p on p.id_produto=i.produto_id=:id
    WHERE i.id_itensvenda=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
 


    $sql_venda=$conn->prepare("SELECT * FROM tb_venda");
    $sql_venda->execute();
    $result_venda=$sql_venda->fetchAll();
    $sql_produto=$conn->prepare("SELECT * FROM tb_produto");
    $sql_produto->execute();
    $result_produto=$sql_produto->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_produto" id="id_produto" value=" <?php echo $result['id_produto']?> " disabled>
        <label for="">Produto</label>
        <input type="text" name="nm_produto" id="nm_produto" value=" <?php echo $result['nm_produto']?> ">
        

        <label for="">venda</label>
        <select name="venda_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_venda as $data) { ?>

    <option <?php  if($data['venda_id']==$result['venda_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['venda_id'] ?>  ">  <?php echo $data['dt_venda'] ?> </option> 

    <?php 
  }
    ?>
    
    </select>
<label for="">produto</label>
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

    <a href="itensvenda.php">Voltar</a>

    <?php
}
?>