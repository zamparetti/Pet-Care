<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');
$sql_receber=$conn->prepare("SELECT * FROM tb_receber");
$sql_receber->execute();
$result_receber=$sql_receber->fetchAll();
?>
<body>
  
  <form action="adicionar_submit.php" method="POST">
  

    <label for="">Data de emissão:</label>
    <input type="text" name="dt_emissao_p" id="dt_emissao_p" placeholder="Data de emissao" required>
    <label for="">Data de recebimento</label>
    <input type="text" name="dt_recto" id="dt_recto" placeholder="Data de recebimento" required>
    <label for="">Data de vencimento:</label>
    <input type="text" name="dt_vencto" id="dt_vencto" placeholder="Data de vencimento" required>
    <label for="">Valor de juros:</label>
    <input type="text" name="vl_juros" id="vl_juros" placeholder="Valor do Juros" required>  
    <label for="">Valor da multa:</label>
    <input type="text" name="vl_multa" id="vl_multa" placeholder="Valor da multa" required>  
    <label for="">Valor da parcela:</label>
    <input type="text" name="vl_parcela" id="vl_parcela" placeholder="Valor da parcela" required>  
    <label for="">Valor recebido:</label>
    <input type="text" name="vl_recebido" id="vl_recebido" placeholder="Valor recebido" required>  
    
    <label for="">Valor total a receber:</label>
  <select name="receber_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_receber as $data) { ?>

    <option value=" <?php echo $data ['id_receber'] ?>  ">  <?php echo $data['vl_tot_receber'] ?> </option> 
    <?php 
  }
    ?>

    </select>

    <label for="">Número do documento:</label>
  <select name="receber_id" id="">
      <option value="" selected>Selecione</option>
      <?php foreach ($result_receber as $data) { ?>

    <option value=" <?php echo $data ['id_receber'] ?>  ">  <?php echo $data['nro_doc'] ?> </option> 
    <?php 
  }
    ?>

    </select>
   
    <input type="submit" value="Enviar">

  </form>    
</body>
</html>