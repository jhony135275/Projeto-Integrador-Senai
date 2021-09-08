<?php
    
    session_start();



    include_once("../db/conexao.php");
   
    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }


    unset( $_SESSION['carrinho'] );
    

    
    echo"<script>alert('Os itens foram retirados do carrinho com sucesso');window.location.href='meu_carrinho.php';
        </script>";

    header( "location:teladeprodutos.php" );
?>