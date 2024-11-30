<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT f.*,c.* FROM tb_fornecedor f LEFT JOIN tb_cidade c 
    ON c.id_cidade=f.cidade_id=:id
    WHERE f.id_fornecedor=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_cidade=$conn->prepare("SELECT * FROM tb_cidade");
    $sql_cidade->execute();
    $result_cidade=$sql_cidade->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_fornecedor" id="id_fornecedor" value=" <?php echo $result['id_fornecedor']?> " disabled>
        <label for="">Fornecedor</label>
        <input type="text" name="nm_fornecedor" id="nm_fornecedor" value=" <?php echo $result['nm_fornecedor']?> ">
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
    <label for="">CPF</label>
        <input type="text" name="cpf_fornecedor" id="cpf_fornecedor" value=" <?php echo $result['cpf_fornecedor']?> ">
        <label for="">Email</label>
        <input type="text" name="email_fornecedor" id="email_fornecedor" value=" <?php echo $result['email_fornecedor']?> ">
        <label for="">CNPJ</label>
        <input type="text" name="cnpj_fornecedor" id="cnpj_fornecedor" value=" <?php echo $result['cnpj_fornecedor']?> ">
        <label for="">Telefone</label>
        <input type="text" name="telefone_fornecedor" id="telefone_fornecedor" value=" <?php echo $result['telefone_fornecedor']?> ">


        
        <input type="hidden" name="id_fornecedor" id="id_fornecedor" value=" <?php echo $result['id_fornecedor']?> " >
        <input type="submit" value="Enviar">
    </form>

    <a href="fornecedor.php">Voltar</a>

    <?php
}
?>