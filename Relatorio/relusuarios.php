<?php
date_default_timezone_set('America/Sao_Paulo');
require ('./vendor/autoload.php');
include ('../BDpetcare/config/conecta.php');
$sql=$conn->prepare("SELECT * FROM tb_usuario");
$sql->execute();

$result=$sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio Usuários</title>
    <style>
        @page{
            margin: 150px 50px ;
        }
        body{
            font-family: 'Verdana', sans-serif;
            margin:0px;
            padding:0px;
        }
        .header{
            position: fixed;
            left: 0;
            right:0;
            top: -100px;
            height: 50px;
            padding: 10px;
            background: #333;
            margin-bottom:100px;
            text-align: center;
        }
        .header img{
            height: 50px;
        }
        .footer{
            position: fixed;
            left: 0;
            right:0;
            bottom:0;
            background: #333;
            color:#FFF;
            text-align: center;
            padding: 10px;
        }
        h1{
            text-align: center;
        }
        table {
            width: 100%;
            border: 1px solid #333;
            padding: 5px;
            table-layout: fixed; /* Tabela de layout fixo */
        }
        table tr th,
        table tr td {
            padding: 10px;
            word-wrap: break-word; /* Quebra palavras longas */
            overflow-wrap: break-word;
            word-break: break-all;
        }
        table tr th {
            background: #333;
            color: #FFF;
        }
        table tr:nth-child(even) td {
            background: #EEE;
        }
        table tr td {
            text-align: center;
        }

        .gerapdf {
            display: inline;
            padding: 15px 25px;
            color: lightblue;
            text-decoration: none;
            transition: background .2s;
            font-size: 20px;
        }

        .gerapdf:hover {
            color: #FFE3E3;
            background-color: grey;
            border-radius: 15px;
            padding: 15px;
            transform: scale(0.5);
            z-index: 1;
        }
    </style>
</head>
<body>

    <h1> Relatório de Usuários </h1>
    <li class="gerapdf"><a href="http://localhost/PetCareAll/Relatorio/gerapdfU.php">Gerar PDF</a></li>
    <li class="gerapdf"><a href="http://localhost/PetCareAll/Relatorio/PaginaRelatorios/pgrelatorios.php">Voltar</a></li>
    <br> <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Login</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $linha) {
                echo "<tr>";  
                echo "<td>".$linha['id_usuario']."</td>";
                echo "<td>".$linha['nm_usuario']."</td>";
                echo "<td>".$linha['email_usuario']."</td>";
                echo "<td>".$linha['login_usuario']."</td>"; 
                echo "<td>".$linha['senha_usuario']."</td>"; 
            }
            ?>
        </tbody>
    </table>

    <footer class="footer">
        Gerado em <?php echo (new Datetime())->format('d/m/Y h:i:s')?>
    </footer>

</body>
</html>
