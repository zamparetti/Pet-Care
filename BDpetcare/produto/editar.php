<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT p.*,g.*,u.* FROM tb_produto p LEFT JOIN tb_grupo g 
    ON g.id_grupo=p.grupo_id=:id LEFT JOIN tb_unidade u on u.id_unidade=p.unidade_id=:id
    WHERE p.id_produto=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
 

    $sql_grupo=$conn->prepare("SELECT * FROM tb_grupo");
    $sql_grupo->execute();
    $result_grupo=$sql_grupo->fetchAll();
    $sql_unidade=$conn->prepare("SELECT * FROM tb_unidade");
    $sql_unidade->execute();
    $result_unidade=$sql_unidade->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_produto" id="id_produto" value=" <?php echo $result['id_produto']?> " disabled>
        <label for="">Produto</label>
        <input type="text" name="nm_produto" id="nm_produto" value=" <?php echo $result['nm_produto']?> ">
        

        <label for="">Grupo</label>
        <select name="grupo_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_grupo as $data) { ?>

    <option <?php  if($data['id_grupo']==$result['grupo_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_grupo'] ?>  ">  <?php echo $data['nm_grupo'] ?> </option> 

    <?php 
  }
    ?>
    
    </select>
<label for="">Unidade</label>
<select name="unidade_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_unidade as $data) { ?>

    <option <?php  if($data['id_unidade']==$result['unidade_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_unidade'] ?>  ">  <?php echo $data['nm_unidade'] ?> </option> 

    <?php 
  }
    ?>

    </select>
    <label for="">Preço de venda</label>
        <input type="text" name="preco_venda" id="preco_venda" value=" <?php echo $result['preco_venda']?> " >
        <label for="">Preço de compra</label>
        <input type="text" name="preco_compra" id="preco_compra" value=" <?php echo $result['preco_compra']?> ">  
        <label for="">Quantidade de Estoque</label>
        <input type="text" name="qtd_estoque" id="qtd_estoque" value=" <?php echo $result['qtd_estoque']?> ">  
        <label for="">Foto do Produto</label>
        <input type="text" name="nm_foto" id="nm_foto" value=" <?php echo $result['nm_foto']?> ">  
        <label for="">Sequencia</label>
        <input type="text" name="sequencia" id="sequencia" value=" <?php echo $result['sequencia']?> "> 

        <input type="hidden" name="id_produto" id="id_produto" value=" <?php echo $result['id_produto']?> " >
        <input type="submit" value="Enviar">
    </form>

    <a href="produto.php">Voltar</a>

    <?php
}
?>