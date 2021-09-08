<?php

    include_once("../../db/conexao.php");
    session_start();

    if( !isset( $_SESSION["adm"] ) && !isset( $_SESSION["senha"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>LISTAGEM EM TELA</title>
  <link rel="icon" href="../../imagens/logo%20final.jpg" sizes="64x64">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">   
         Home
        </a>
         
  </nav>
      <br><br><br>


  

    <table class="table">
        <tr>
          
          <th align="center">COD_ITEM</th>
          <th align="center">DESCRICAO</th>
          <th align="center">VALOR_UNITARIO</th>
          <th align="center">BREVE DESCRICAO</th>
          
        </tr>

        
            
        
      
<?php

  

  $_sql = "SELECT * FROM fornecedor ORDER BY cod_fornecedor ASC";

  $read_fornecedor = mysqli_query($_conexao, $_sql) or die(mysqli_error($_conexao));

  
     if(mysqli_num_rows($read_fornecedor) > '0')
            
     {

              foreach ($read_fornecedor as $read_fornecedor_view) 
              {


               echo  utf8_encode('<a class="navbar-brand" href="telalistaitensforn.php?cod='.$read_fornecedor_view['cod_fornecedor'].'"> &#160 &#160 &#160'.$read_fornecedor_view['nome'].'</a>');

               echo '<a class="navbar-brand">   
                   -
                </a>';

                  
                    echo '<a class="navbar-brand" href="../../pdf/itensporfornecedor.php?cod='.$read_fornecedor_view['cod_fornecedor'].'" class="list-group-item">PDF</a>';
                  echo '<br>';
                 
                  

                







              }

    }
   ?>
   <?php
  
         //se existir uma categoria
          if(isset($_GET['cod']) && $_GET['cod'] !='')
          {
            //pega o conteudo da categoria(cat) e atribui na variavel id_cat
            $id = addslashes($_GET['cod']);
            $sql_fornecedor = "AND cod_fornecedor ='".$id."'";

          }
          else
          {
            //se nao houver categoria

             $sql_fornecedor = "";
          }
          $read_produto = mysqli_query($_conexao, "SELECT * FROM itemxfornecedor WHERE cod_item !=''  $sql_fornecedor ORDER BY cod_fornecedor ASC");

          if(mysqli_num_rows($read_produto) > '0')
          #SE O NUMERO DE LINHAS NO SELECT FOR MAIOR QUE ZERO IR PARA O FOREACH
            {

              foreach ($read_produto as $read_produto_view) 
              {
                     
  
?>
  <tr>
    <td align="center"><?php echo $read_produto_view['cod_item']; ?></td>

<?php
  
    $_sql2 = "SELECT * FROM item WHERE cod_item = '".$read_produto_view['cod_item']."' ORDER BY cod_item ASC";

    $read_item = mysqli_query($_conexao, $_sql2) or die(mysqli_error($_conexao));

    if(mysqli_num_rows($read_item) > '0')
            
     {

              foreach ($read_item as $read_item_view) 
              {


?>
  
  <td align="left"><?php echo utf8_encode(($read_item_view['descricao']))?></td>
  <td align="left">R$ <?php echo number_format($read_item_view['valor_unitario'], 2,".",",")?></td>
  <td align="center"><?php echo utf8_encode(($read_item_view['breve_descricao']))?></td>

  <?php

                    
                  

              }

    }


?>
   

    
    </tr>

<?php

    }}
?>
 </table>




<br>
<br>


<br><br><br><br>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>