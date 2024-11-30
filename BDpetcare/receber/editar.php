<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT r.*,c.* FROM tb_receber r LEFT JOIN tb_cliente c 
    ON c.id_cliente=r.cliente_id=:id
    WHERE r.id_receber=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_cliente=$conn->prepare("SELECT * FROM tb_cliente");
    $sql_cliente->execute();
    $result_cliente=$sql_cliente->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_receber" id="id_receber" value=" <?php echo $result['id_receber']?> " disabled>


        <select name="cliente_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_cliente as $data) { ?>

    <option <?php  if($data['id_cliente']==$result['cliente_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_cliente'] ?>  ">  <?php echo $data['nm_cliente'] ?> </option> 

    <?php 
  }
    ?>

    </select>

        <label for="">Data de Emissão</label>
        <input type="text" name="dt_emissao" id="dt_emissao" value=" <?php echo $result['dt_emissao']?> ">
        <label for="">cliente</label>

        
       

    <label for="">Numero do documento</label>
        <input type="text" name="nro_doc" id="nro_doc" value=" <?php echo $result['nro_doc']?> ">
        <label for="">Numero de parcelas</label>
        <input type="text" name="nro_parcelas" id="nro_parcelas" value=" <?php echo $result['nro_parcelas']?> ">
        <label for="">Valor total a receber</label>
        <input type="text" name="vl_tot_receber" id="vl_tot_receber" value=" <?php echo $result['vl_tot_receber']?> ">
        
        <input type="hidden" name="id_receber" id="id_receber" value=" <?php echo $result['id_receber']?> " >
        <input type="submit" value="Enviar">
    </form>

    <a href="receber.php">Voltar</a>

    <?php
}
?>