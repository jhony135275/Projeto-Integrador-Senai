<?php
  session_start();
  include_once("../db/conexao.php");

   
  if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
  {
   
      header( "location: login.php" );
        
      exit; // encerra todas as funções da página...
  }



  $_id_produto = (isset($_GET['id']) ? $_GET['id'] : '');
  if(!isset($_SESSION['carrinho'])){
      $_SESSION['carrinho'] = array();
  }
  $read_produto = mysqli_query($_conexao, "SELECT * FROM item WHERE cod_item ='".$_id_produto."' ORDER BY descricao ASC");
  if(mysqli_num_rows($read_produto) > '0'){
      foreach ($read_produto as $read_produto_view);
      if(isset($_SESSION['carrinho'][$_id_produto])){
        $_SESSION['carrinho'][$_id_produto] +=1;

      } 
      else
      {
         $_SESSION['carrinho'][$_id_produto] = 1;
      }
      
    //header("Location:meu_carrinho.php");
    print_r( $_SESSION['carrinho']);
    
    /*echo "<script></script>";
    setTimeout("window.location = 'teladeprodutos.php'", 2000);*/

    echo"<script>alert('Item adicionado com sucesso');window.location.href='meu_carrinho.php';
        </script>";
   
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

  <title>Meu Carrinho</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.html">Home</a>
      <a class="navbar-brand" href="teladeprodutos.php">Tela de produtos</a>
      <a class="navbar-brand" href="meus_pedidos.php">Meus pedidos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
         
          <li class="nav-item">
             
             <a class="nav-link" href="limparcarrinho.php">limpar carrinho</a>
             <a class="nav-link" href="logout.php">Sair da conta</a>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br> <br>

  <!-- Page Content -->
  <div class="container">

    <div class="row">


     
      <!-- /.col-lg-3 -->

      <div class="col-lg-10">

          <div class="container">

    <div class="row">

    
     
    <div class="col-lg-12">

        <h2>Carrinho:</h2>

        <table class="table">
          <tr>
            
            <td>Item</td>
            <td>Descricao</td>
            <td>Valor unitário</td>
            <td>Quantidade</td>
            <td>Valor Total</td>
            <td>Opções</td>
          
           
          </tr>
          <?php

          $_valor_total_venda = '0';

          $_item_carrinho = '0';
          if(count($_SESSION['carrinho']) >'0')
          {
            foreach ($_SESSION['carrinho'] as $_id_produto_carrinho => $_quantidade_produto_carrinho) 
            {
                $_item_carrinho++;
                $read_produto_carrinho = mysqli_query($_conexao, "SELECT descricao, valor_unitario FROM item WHERE cod_item = '".$_id_produto_carrinho."'");
                if(mysqli_num_rows($read_produto_carrinho) > '0')
                {
                  foreach ($read_produto_carrinho as $read_produto_carrinho_view);
                  $_valor_total_produto_carrinho = $_quantidade_produto_carrinho * $read_produto_carrinho_view['valor_unitario'];

                 
                  $_valor_total_venda += $_valor_total_produto_carrinho;
                   
                }

              echo '<tr>
            
            <td>'.$_item_carrinho.'</td>
            <td>'.utf8_encode($read_produto_carrinho_view['descricao']).'</td>
            <td>'.number_format($read_produto_carrinho_view['valor_unitario'],2,',','.').'</td>
            <td>'.$_quantidade_produto_carrinho.'</td>
            <td>'.number_format($_valor_total_produto_carrinho,2,',','.').'</td>
            <td><a href="deletar_prod_carrinho.php?id='.$_id_produto_carrinho.'">Remover do carrinho</td>
          
           
          </tr>';
             
            }
          }

          ?>



         
        </table>
        <hr>
        <h3>Valor Total da Compra: <?php echo number_format($_valor_total_venda,2,',','.') ; ?></h3>

         <div class="text-right">
            <a href="finalizar_pedido.php"class="btn btn-success">Finalizar Pedido</a>           
          </div>
          <hr>


     </div> 
    





  </div>
  <!-- /.container -->

        

      </div>
      <!-- /.col-lg-9 -->


    </div>
    <!-- /.row -->

  </div>

</div>
  <!-- /.container -->

 

         <br><br> <br><br> <br><br> <br><br><br><br> <br><br> <br><br>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Padaria Ouro Preto</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
