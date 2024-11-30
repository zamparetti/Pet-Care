<?php
include ('../config/conecta.php');

if (!empty($_GET['id'])   ) {
    $id=$_GET['id'];

    $sql=$conn->prepare("SELECT * FROM tb_grupo WHERE id_grupo=:id LIMIT 1");
    $sql->bindParam(':id',$id);
    $sql->execute();
    $result=$sql->fetch();
  
    ?>

    <form action="editar_submit.php" method="post">
    <label for="">ID</label>

        <input type="text" name="id_grupo" id=""   value="<?php echo $result['id_grupo']?>  " disabled >
        <label for="">Nome</label>
        <input type="text" name="nm_grupo" id=""   value="<?php echo $result['nm_grupo']?>  " >
        <input type="hidden" name="id_grupo" id=""   value="<?php echo $result['id_grupo']?>  "  >
        <input type="submit" value="Enviar">
    </form>

    <?php
}




?>