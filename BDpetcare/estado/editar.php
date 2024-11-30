<?php 
include('../config/conecta.php');
if(!empty($_GET['id']) ){
    $id=$_GET['id'];

    $sql=$conn->prepare("SELECT e.*,r.* FROM tb_estado e LEFT JOIN tb_regiao r 
    ON r.id_regiao=e.regiao_id=:id
    WHERE e.id_estado=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_regiao=$conn->prepare("SELECT * FROM tb_regiao");
    $sql_regiao->execute();
    $result_regiao=$sql_regiao->fetchAll();
    ?>
    

    ?>
    
    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_estado" id=""  value="<?php echo $result['id_estado']?>" disabled>
        <label for="">Nome</label>
        <input type="text" name="nome" id=""  value="<?php echo $result['nome']?>">
        <label for="">UF</label>
        <input type="text" name="uf" id=""  value="<?php echo $result['uf']?>">
        <input type="hidden" name="id_estado" id=""  value="<?php echo $result['id_estado']?>" >
      <label for="">Região</label>
        <select name="regiao_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_regiao as $data) { ?>

    <option <?php  if($data['id_regiao']==$result['regiao_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_regiao'] ?>  ">  <?php echo $data['nm_regiao'] ?> </option> 

    <?php 
  }
    ?>

    </select>
        
        
        <input type="submit" value="Enviar">
    </form>


    <?php 
     }

    ?>