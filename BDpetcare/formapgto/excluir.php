<?php 

if(!empty( $_GET['id'])){
    $id= $_GET['id'];

    include('../config/conecta.php');
    $sql=$conn->prepare("DELETE FROM tb_forma_pgto WHERE id_forma_pgto= :id");
    $sql->bindParam(':id',$id);
    $sql->execute();
}
header('location:formapgto.php');

?>