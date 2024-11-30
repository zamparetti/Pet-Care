<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("SELECT p.*,r.* FROM tb_parcela p LEFT JOIN tb_receber r 
    ON r.id_receber=p.receber_id=:id
    WHERE p.id_parcela=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();

    $sql_receber=$conn->prepare("SELECT * FROM tb_receber");
    $sql_receber->execute();
    $result_receber=$sql_receber->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="">ID</label>
        <input type="text" name="id_parcela" id="id_parcela" value=" <?php echo $result['id_parcela']?> " disabled>

        <label for="">Data de Emissão</label>
        <input type="text" name="dt_emissao_p" id="dt_emissao_p" value=" <?php echo $result['dt_emissao_p']?> ">
      
    <label for="">Data do recebimento</label>
        <input type="text" name="dt_recto" id="dt_recto" value=" <?php echo $result['dt_recto']?> ">
        <label for="">Data do vencimento</label>
        <input type="text" name="dt_vencto" id="dt_vencto" value=" <?php echo $result['dt_vencto']?> ">
        <label for="">Valor do juros</label>
        <input type="text" name="vl_juros" id="vl_juros" value=" <?php echo $result['vl_juros']?> ">

        <label for="">Valor da multa</label>
        <input type="text" name="vl_multa" id="vl_multa" value=" <?php echo $result['vl_multa']?> ">
        <label for="">Valor da parcela</label>
        <input type="text" name="vl_parcela" id="vl_parcela" value=" <?php echo $result['vl_parcela']?> ">
        <label for="">Valor recebido</label>
        <input type="text" name="vl_recebido" id="vl_recebido" value=" <?php echo $result['vl_recebido']?> ">

        <label for="">Valor total a receber</label>
        <select name="receber_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_receber as $data) { ?>

    <option <?php  if($data['id_receber']==$result['receber_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_receber'] ?>  ">  <?php echo $data['vl_tot_receber'] ?> </option> 

    <?php 
  }
    ?>

    </select>

    <label for="">Número do documento</label>
    <select name="receber_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_receber as $data) { ?>

    <option <?php  if($data['id_receber']==$result['receber_id']){ ?> selected <?php  } ?>        
    value=" <?php echo $data ['id_receber'] ?>  ">  <?php echo $data['nro_doc'] ?> </option> 

    <?php 
  }
    ?>

    </select>

    <input type="hidden" name="id_parcela" id="id_parcela" value=" <?php echo $result['id_parcela']?> " >
        <input type="submit" value="Enviar">

    </form>

    <a href="parcela.php">Voltar</a>

    <?php
}
?>