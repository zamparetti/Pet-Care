<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Parcela</title>
</head>
<?php
include('../config/conecta.php');

$sql_receber = $conn->prepare("SELECT * FROM tb_receber");
$sql_receber->execute();
$result_receber = $sql_receber->fetchAll();
?>
<body>
  
  <form action="adicionar_submit.php" method="POST">
    

    <label for="">Data de Emissão:</label>
    <input type="text" name="dt_emissao_p" id="dt_emissao_p" placeholder="Data de emissão" required>
    
    <label for="">Data do Recebimento:</label>
    <input type="text" name="dt_recto" id="dt_recto" placeholder="Data do recebimento" required>
    
    <label for="">Data do Vencimento:</label>
    <input type="text" name="dt_vencto" id="dt_vencto" placeholder="Data do vencimento" required>
    
    <label for="">Valor do Juros:</label>
    <input type="text" name="vl_juros" id="vl_juros" placeholder="Valor do juros" required>

    <label for="">Valor da Multa:</label>
    <input type="text" name="vl_multa" id="vl_multa" placeholder="Valor da multa" required>

    <label for="">Valor da Parcela:</label>
    <input type="text" name="vl_parcela" id="vl_parcela" placeholder="Valor da parcela" required>

    <label for="">Valor Recebido:</label>
    <input type="text" name="vl_recebido" id="vl_recebido" placeholder="Valor recebido" required>

    <label for="">Número de Parcelas:</label>
    <input type="text" name="nro_parcelas" id="nro_parcelas" placeholder="Número de parcelas" required>

    <label for="">Valor total a receber:</label>
    <select name="receber_id" id="">
        <option value="" selected>Selecione</option>
        <?php foreach ($result_receber as $data) { ?>
            <option value="<?php echo $data['id_receber']; ?>"><?php echo $data['vl_tot_receber']; ?></option> 
        <?php } ?>
    </select>

    <label for="">Numero do documento:</label>
    <select name="receber_id" id="">
        <option value="" selected>Selecione</option>
        <?php foreach ($result_receber as $data) { ?>
            <option value="<?php echo $data['id_receber']; ?>"><?php echo $data['nro_doc']; ?></option> 
        <?php } ?>
    </select>

    <input type="submit" value="Enviar">
  </form>    

  <a href="parcela.php">Voltar</a>

</body>
</html>
