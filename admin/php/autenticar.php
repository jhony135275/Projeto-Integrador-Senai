
<?php

    include_once("../../db/conexao.php");

    $_login = $_POST['login'];
    $_password = $_POST['password'];

    if($_login == "" || $_login == null|| $_password == "" || $_password == null)
    {
        echo"<script>
        alert('Preencha os campos corretamente');
        window.location.href='login.php';
        </script>";
        exit();
    }



    if($_login == "adm" && $_password == "123")
    {
        session_start();
        
        $_SESSION['adm'] = $_POST['login'];
        $_SESSION['senha'] = $_POST['password'];

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>AUTENTICANDO O USUÁRIO</title>
        <link type="text/css" rel="stylesheet" href="../css/estilo.css">
        <script type="text/javascript" src="../js/funcoes.js"></script>
    </head>
    <body>
        
        <div id="conteudo">
            <?php
                echo "<p aling='center'>Usuário logado com sucesso !!<br>redirecionando o sistema...</p>";
                header("location:../index.php");
            ?>
        </div>
    </body>
</html>
<?php
    }
    else
    {
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>AUTENTICANDO O USUÁRIO</title>
        <link type="text/css" rel="stylesheet" href="../css/estilo.css">
        <script type="text/javascript" src="../js/funcoes.js"></script>
    </head>
    <body>
        
        <div id="conteudo">
            <?php
                echo"<script>
                 alert('Usuario invalido');
                window.location.href='login.php';
                </script>";
                

            ?>
        </div>
    </body>
</html>
<?php
    }
?>