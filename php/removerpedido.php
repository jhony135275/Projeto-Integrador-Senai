<?php

    include_once("../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }


    $_id_pedido = addslashes($_GET['codpedido']); 

    if( !isset($_id_pedido))
    {
        echo"<script>
            alert('Erro ao cancelar pedido!');
            window.location.href='meus_pedidos.php';
            </script>";
            exit();
        
       
    }
    

    $_sql = "UPDATE pedido SET status_pedido = 'Cancelado' WHERE cod_pedido ='".$_id_pedido."'";

    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error($_conexao) );

    if($_query)
    {
        echo"<script>
            alert('Pedido cancelado com sucesso!');
            window.location.href='meus_pedidos.php';
            </script>";
            exit();
    }
    else
    {
         echo"<script>
            alert('Erro ao cancelar pedido!');
            window.location.href='meus_pedidos.php';
            </script>";
            exit();
        
    }

                   
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../imagens/logo%20final.jpg" sizes="64x64">


  <title>Meus pedidos</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

 
 

    
     
    

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
