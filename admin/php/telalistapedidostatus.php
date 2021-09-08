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

   <div class="col-lg-12">

     
        <a class="navbar-brand" href="telalistapedidostatus.php?status=processando">   
        &#160&#160 Processando
        </a>
        <a class="navbar-brand">   
         -
        </a>
       
        <a class="navbar-brand" href="../../pdf/pedidosporstatus.php?status=processando">   
        PDF
        </a>
         <a class="navbar-brand">   
         |
        </a>

        <a class="navbar-brand" href="telalistapedidostatus.php?status=cancelado">   
         Cancelado
        </a>
        <a class="navbar-brand">   
         -
        </a>

        <a class="navbar-brand" href="../../pdf/pedidosporstatus.php?status=cancelado">   
        PDF
        </a>
         <a class="navbar-brand">   
         |
        </a>
        
        
       

        <a class="navbar-brand" href="telalistapedidostatus.php?status=pago">   
         Pago
        </a>
        <a class="navbar-brand">   
         -
        </a>

        <a class="navbar-brand" href="../../pdf/pedidosporstatus.php?status=pago">   
        PDF
        </a>
              
      



       
        
        <br><br>

        
    </div>
    <!--  -->


    
    
     
    


		<table class="table">
				<tr>
          

          <th align="center">COD_PEDIDO</th>
          <th align="center">COD_CLIENTE</th>
          <th align="center">VALOR_TOTAL</th>
          <th align="center">DESCONTO</th>
					<th align="center">DATA</th>
          <th align="center">HORA</th>
				
					
				</tr>
		
			

       

    
    <?php
  
         //se existir uma categoria
          if(isset($_GET['status']) && $_GET['status'] !='')
          {
            //pega o conteudo da categoria(cat) e atribui na variavel id_cat
            $status = addslashes($_GET['status']);
            $sql_status = "AND status_pedido ='".$status."'";

          }
          else
          {
            //se nao houver categoria

            $sql_status = "";
          }
          $read_pedido = mysqli_query($_conexao, "SELECT * FROM pedido WHERE cod_pedido !='' $sql_status ORDER BY cod_pedido ASC");

          if(mysqli_num_rows($read_pedido) > '0')
          #SE O NUMERO DE LINHAS NO SELECT FOR MAIOR QUE ZERO IR PARA O FOREACH
            {

              foreach ($read_pedido as $read_pedido_view) 
              {
                     
  
?>
        <tr>
            <td align="center"><?php echo $read_pedido_view['cod_pedido']; ?></td>
            <td align="left"><?php echo utf8_encode(($read_pedido_view['cod_cliente']))?></td>
            <td align="left">R$ <?php echo number_format($read_pedido_view['valor_total'], 2,".",",")?></td>
            <td align="center"><?php echo utf8_encode(($read_pedido_view['desconto']))?></td>
            <td align="center"><?php echo utf8_encode(($read_pedido_view['data']))?></td>
            <td align="center"><?php echo utf8_encode(($read_pedido_view['hora']))?></td>
            
            
        </tr>

<?php

    }}
?>      

                  
	   </table>
   
   



<br>
<br>



			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>