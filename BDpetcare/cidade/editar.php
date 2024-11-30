<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT c.*,e.* FROM tb_cidade c LEFT JOIN tb_estado e 
    ON e.id_estado=c.estado_id=:id
    WHERE c.id_cidade=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_estado=$conn->prepare("SELECT * FROM tb_estado");
    $sql_estado->execute();
    $result_estado=$sql_estado->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_cidade" id="id_cidade" value=" <?php echo $result['id_cidade']?> " disabled>
        <label for="">Cidade</label>
        <input type="text" name="nm_cidade" id="nm_cidade" value=" <?php echo $result['nm_cidade']?> ">
        <label for="">Estado</label>

        
        <select name="estado_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_estado as $data) { ?>

    <option <?php  if($data['id_estado']==$result['estado_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_estado'] ?>  ">  <?php echo $data['nome'] ?> </option> 

    <?php 
  }
    ?>

    </select>
        
        <input type="hidden" name="id_cidade" id="id_cidade" value=" <?php echo $result['id_cidade']?> " >
        <input type="submit" value="Enviar">
    </form>

    <a href="cidade.php">Voltar</a>

    <?php
}
?>