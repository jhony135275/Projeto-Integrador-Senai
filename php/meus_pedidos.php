<?php

    include_once("../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.html">Home</a>
      <a class="navbar-brand" href="teladeprodutos.php">Tela de produtos</a>
      <a class="navbar-brand" href="meu_carrinho.php">Meu carrinho </a>
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

        <h2>Meus pedidos:</h2>

        <table class="table">
          <tr>
            
            <td>Id do pedido</td>
            <td>Valor Total</td>
            <td>Status</td>
            <td>Data</td>
            <td>Hora</td>
            <td>Opções</td>
          
           
          </tr>
          <?php

          $_id_session_cliente = $_SESSION['login'];
          $_sql_captura_id_cliente = "SELECT * FROM cliente WHERE user = md5('$_id_session_cliente')";
          $_query = mysqli_query($_conexao,$_sql_captura_id_cliente) or die (mysqli_error($_conexao));
          $_line = mysqli_fetch_array($_query);
          $_id_cliente = $_line['cod_cliente'];
          $read_pedido  = mysqli_query($_conexao,"SELECT * FROM pedido WHERE cod_cliente ='".$_id_cliente."'  ORDER BY data DESC");

      

            if(mysqli_num_rows($read_pedido) > '0')
            {
              foreach ($read_pedido as $read_pedido_view) 
              {
                  $_pedido =  $read_pedido_view['cod_pedido'];

               
                  echo '<tr>

                  <td>'.$read_pedido_view['cod_pedido'].'</td>   
                  <td>R$'.$read_pedido_view['valor_total'].'</td>   
                  <td>'.$read_pedido_view['status_pedido'].'</td>         
                  <td>'.$read_pedido_view['data'].'</td>
                  <td>'.$read_pedido_view['hora'].'</td>
                  <td><a href="removerpedido.php?codpedido='.$_pedido.'">Cancelar pedido</a> </td>
                  
                           
                 
                 </tr>';
                     
              }
            }
          

          ?>

         
        </table>
        <br>
         <a href="../pdf/pedidosporcliente.php"class="btn btn-success">Gerar PDF</a>   
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
