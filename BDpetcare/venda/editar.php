<?php
include('../config/conecta.php');

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT v.*, ve.*, c.*, n.* FROM tb_venda v
        LEFT JOIN tb_vendedor ve ON ve.id_vendedor = v.vendedor_id
        LEFT JOIN tb_cliente c ON c.id_cliente = v.cliente_id
        LEFT JOIN tb_natureza n ON n.id_natureza = v.natureza_id
        WHERE v.id = :id LIMIT 1");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $result = $sql->fetch();

    $sql_vendedor = $conn->prepare("SELECT * FROM tb_vendedor");
    $sql_vendedor->execute();
    $result_vendedor = $sql_vendedor->fetchAll();

    $sql_cliente = $conn->prepare("SELECT * FROM tb_cliente");
    $sql_cliente->execute();
    $result_cliente = $sql_cliente->fetchAll();

    $sql_natureza = $conn->prepare("SELECT * FROM tb_natureza");
    $sql_natureza->execute();
    $result_natureza = $sql_natureza->fetchAll();
    ?>

    <form action="editar_submit.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" id="id" value="<?php echo $result['id']; ?>" disabled>

        <label for="dt_venda">Data da venda</label>
        <input type="text" name="dt_venda" id="dt_venda" value="<?php echo $result['dt_venda']; ?>">

        <label for="vendedor_id">Nome do Vendedor</label>
        <select name="vendedor_id" id="vendedor_id">
            <option value="" selected>Selecione</option>
            <?php foreach ($result_vendedor as $data) { ?>
                <option value="<?php echo $data['id_vendedor']; ?>"
                    <?php if ($data['id_vendedor'] == $result['vendedor_id']) { ?> selected <?php } ?>>
                    <?php echo $data['nm_vendedor']; ?>
                </option>
            <?php } ?>
        </select>

        <label for="cliente_id">Nome do cliente</label>
        <select name="cliente_id" id="cliente_id">
            <option value="" selected>Selecione</option>
            <?php foreach ($result_cliente as $data) { ?>
                <option value="<?php echo $data['id_cliente']; ?>"
                    <?php if ($data['id_cliente'] == $result['cliente_id']) { ?> selected <?php } ?>>
                    <?php echo $data['nm_cliente']; ?>
                </option>
            <?php } ?>
        </select>

        <label for="natureza_id">Natureza</label>
        <select name="natureza_id" id="natureza_id">
            <option value="" selected>Selecione</option>
            <?php foreach ($result_natureza as $data) { ?>
                <option value="<?php echo $data['id_natureza']; ?>"
                    <?php if ($data['id_natureza'] == $result['natureza_id']) { ?> selected <?php } ?>>
                    <?php echo $data['nm_natureza']; ?>
                </option>
            <?php } ?>
        </select>
        <input type="text" name="id" id="id" value="<?php echo $result['id']; ?>" hidden>
        <input type="submit" value="Salvar">
    </form>

    <a href="voltar.php">Voltar</a>

    <?php
}
?>
