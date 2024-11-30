<?php
include ('../config/conecta.php');

if (!empty($_GET['id'])   ) {
    $id=$_GET['id'];

    $sql=$conn->prepare("SELECT * FROM tb_comprador WHERE id_comprador=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
  
    ?>

    <form action="editar_submit.php" method="post">
    <label for="">ID</label>

        <input type="text" name="id_comprador" id=""   value="<?php echo $result['id_comprador']?>  " disabled >
        <label for="">Nome</label>
        <input type="text" name="nm_comprador" id=""   value="<?php echo $result['nm_comprador']?>  " >
        <input type="hidden" name="id_comprador" id=""   value="<?php echo $result['id_comprador']?>  "  >
        <input type="submit" value="Enviar">
    </form>

    <?php
}




?>