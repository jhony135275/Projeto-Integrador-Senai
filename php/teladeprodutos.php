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

  <title>Tela de produtos</title>

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
      <a class="navbar-brand" href="meu_carrinho.php">Meu carrinho </a>
      <a class="navbar-brand" href="meus_pedidos.php">Meus pedidos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
         
          <li class="nav-item">
            
             <a class="nav-link" href="limparcarrinho.php">Limpar carrinho </a>
             <a class="nav-link" href="logout.php">Sair da conta</a>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br> <br><br> <br><br> 
  <!-- Page Content -->
  <div class="container">

    <div class="row">


      <div class="col-lg-3">

        <h1 class="my-4">Ouro Preto</h1>
        <div class="list-group">

          <?php
            $read_categoria = mysqli_query($_conexao, "SELECT * FROM categoria ORDER BY categoria_descricao DESC");
            if(mysqli_num_rows($read_categoria) > '0')
            {

              foreach ($read_categoria as $read_categoria_view) 
              {

                  echo '<a href="teladeprodutos.php?cat='.$read_categoria_view['categoria_id'].'" class="list-group-item">'.$read_categoria_view['categoria_descricao'].'</a>';

              }

            }
          ?>


        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">


        <div class="row">


      <?php

          //se existir uma categoria
          if(isset($_GET['cat']) && $_GET['cat'] !='')
          {
            //pega o conteudo da categoria(cat) e atribui na variavel id_cat
            $id_cat = addslashes($_GET['cat']);

            $sql_categoria = "AND item_id_categoria ='".$id_cat."'";

          }
          else
          {
            //se nao houver categoria
            $sql_categoria = "";
          }
          $read_produto = mysqli_query($_conexao, "SELECT * FROM item WHERE cod_item !='' $sql_categoria ORDER BY descricao ASC");

          if(mysqli_num_rows($read_produto) > '0')
          #SE O NUMERO DE LINHAS NO SELECT FOR MAIOR QUE ZERO IR PARA O FOREACH
            {

              foreach ($read_produto as $read_produto_view) 
              {
                     
      ?>

          <div class="col-lg-4 col-md-4 mb-10">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $read_produto_view['imagem']?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="produtos.php?id=<?php echo $read_produto_view['cod_item']?>"><?php echo utf8_encode(($read_produto_view['descricao']))?></a>
                </h4>
                <h5>R$ <?php echo number_format($read_produto_view['valor_unitario'], 2,".",",")?></h5>
                <p class="card-text"><?php echo utf8_encode(($read_produto_view['breve_descricao']))?></p>
              </div>
             
            </div>

        
          </div>




               <?php
              }
            }
        ?>


                </div>
        <!-- /.row -->
       

      

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

