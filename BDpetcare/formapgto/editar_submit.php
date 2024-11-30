<?php 

include('../config/conecta.php');

$id_forma_pgto = $_POST['id_forma_pgto'];
$nome = $_POST['nm_forma_pgto'];

$sql = $conn->prepare("UPDATE tb_forma_pgto SET nm_forma_pgto = :nm_forma_pgto WHERE id_forma_pgto = :id_forma_pgto");
$sql->bindParam(':nm_forma_pgto', $nome);
$sql->bindParam(':id_forma_pgto', $id_forma_pgto);
$sql->execute();
header('Location: formapgto.php');
exit; 
?>
