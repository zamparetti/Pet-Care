<?php 

if(!empty( $_GET['id'])){
    $id= $_GET['id'];

    include('../config/conecta.php');
    $sql=$conn->prepare("DELETE FROM tb_estado WHERE id_estado= :id");
    $sql->bindParam(':id',$id);
    $sql->execute();
}
header('location: estado.php');

?>