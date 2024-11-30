<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT e.*,c.* FROM tb_emitente e LEFT JOIN tb_cidade c 
    ON c.id_cidade=e.cidade_id=:id
    WHERE e.id_emitente=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_cidade=$conn->prepare("SELECT * FROM tb_cidade");
    $sql_cidade->execute();
    $result_cidade=$sql_cidade->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_emitente" id="id_emitente" value=" <?php echo $result['id_emitente']?> " disabled>
        <label for="">Nome</label>
        <input type="text" name="nm_emitente" id="nm_emitente" value=" <?php echo $result['nm_emitente']?> ">
       
        <label for="">Cidade</label>

        
        <select name="cidade_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_cidade as $data) { ?>

    <option <?php  if($data['id_cidade']==$result['cidade_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_cidade'] ?>  ">  <?php echo $data['nm_cidade'] ?> </option> 

    <?php 
  }
    ?>

    </select>
        
        <input type="hidden" name="id_cidade" id="id_cidade" value=" <?php echo $result['id_cidade']?> " >

        <label for="">CNPJ</label>
        <input type="text" name="cnpj_emitente" id="cnpj_emitente" value=" <?php echo $result['cnpj_emitente']?> ">

        <label for="">Rua</label>
        <input type="text" name="end_rua" id="end_rua" value=" <?php echo $result['end_rua']?> ">
        
        <label for="">N.º da Casa</label>
        <input type="text" name="end_nro" id="end_nro" value=" <?php echo $result['end_nro']?> ">
        
        <label for="">Bairro</label>
        <input type="text" name="end_bairro" id="end_bairro" value=" <?php echo $result['end_bairro']?> ">
        
        <input type="hidden" name="id_emitente" id="id_emitente" value=" <?php echo $result['id_emitente']?>" >
        <input type="submit" value="Enviar">
    </form>
          
    <a href="emitent
    e.php">Voltar</a>

    <?php
}
?>