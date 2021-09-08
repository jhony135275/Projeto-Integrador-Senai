<?php
  session_start();
  include_once("../db/conexao.php");



    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }

  //PEGA O QUE VEM NO URL METODO GET E ARMAZENA EM id_produto
  $_id_produto = addslashes($_GET['id']); 
  

  $read_produto = mysqli_query($_conexao, "SELECT * FROM item WHERE cod_item ='".$_id_produto."' ORDER BY descricao ASC");
    if(mysqli_num_rows($read_produto) > '0')
    #SE O NUMERO DE LINHAS NO SELECT FOR MAIOR QUE ZERO IR PARA O FOREACH
    {

      foreach ($read_produto as $read_produto_view);
    }
    else
    {
      header("Location:teladeprodutos.php");
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

  <title>Produto</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="teladeprodutos.php">Tela de produtos</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
         
          <li class="nav-item">
             <a class="nav-link" href="meu_carrinho.php">Meu carrinho </a>
             <a class="nav-link" href="limparcarrinho.php">Limpar carrinho</a>
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


      <div class="col-lg-3">

         <img class="card-img" height="181" src="<?php echo $read_produto_view['imagem']?>">

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

          <div class="container">

    <div class="row">

    
     

      <div class="col-lg-12">

        <div class="card md-11">
         
          <div class="card-body">
            <h3 class="card-title"> <a href="produtos.php?id=<?php echo $read_produto_view['cod_item']?>"><?php echo utf8_encode(($read_produto_view['descricao']))?></a></h3>
            <h4>R$ <?php echo number_format($read_produto_view['valor_unitario'], 2,".",",")?></h4>
            
           
            <p class="card-text"><?php echo utf8_encode(($read_produto_view['breve_descricao']))?></p>
          </div>
          <div class="text-right">
            <a href="meu_carrinho.php?id=<?php echo $_id_produto;?>"class="btn btn-success">Adicionar ao carrinho</a>           
          </div>
        </div>
       
        

       
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

        

      </div>
      <!-- /.col-lg-9 -->


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->

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
