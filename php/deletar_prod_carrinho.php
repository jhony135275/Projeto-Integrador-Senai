
<?php

    include_once("../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }



unset($_SESSION['carrinho'][$_GET['id']]);

header("Location: meu_carrinho.php");



?>
