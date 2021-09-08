<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>LISTAGEM DE USUÁRIO</title>
        <style>
            *{
                font-family: Arial, sans-serif;
            }
            a{
                text-decoration:none;
                color: bisque;
                font-weight: bold;
                border: 1px solid #FFF;
                padding: 8px;
                background-color: dimgray;
            }
        </style>
    </head>
    <body bgcolor= "#AEAEAE">
        <center>
            <br>
            <h1>TABELA DE USUÁRIOS</h1>
            <br><hr><br>
            <a href="pdf.php">GERAR ARQUIVO PDF</a>
            <span>&nbsp;&nbsp;&nbsp;</span>
            <a href="index.php">VOLTAR PARA O MENU</a>
            <br><br><br>
            <table cellspacing="2px" cellpadding="5px" border="3px">
                <tr>
                    <th align="center"><b>ID</b></th>
                    <th align="center"><b>LOGIN</b></th>
                    <th align="center"><b>PASSWORD</b></th>
                    <th align="center"><b>TYPE</b></th>
                </tr>
<?php
    include_once("db/conexao.php");

    $_sql = $_pdo->prepare( "SELECT * FROM usuario" );

    $_sql->execute();

    $_resultset = $_sql->fetchAll(PDO::FETCH_ASSOC); // trazer o sql em vetores associativos - nome e valor da posição

    foreach( $_resultset as $_line ){
?>
                <tr>
                <td align="center"><?php echo $_line['id'];?></td>
                <td align="center"><?php echo $_line['login'];?></td>
                <td align="center"><?php echo $_line['password'];?></td>
                <td align="center"><?php echo $_line['type'];?></td>
                </tr>
<?php
    }
?>
            </table>
        </center>
    </body>
</html>