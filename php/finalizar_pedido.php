<?php

	session_start();

	$_valor_total_venda = '0';
	include_once("../db/conexao.php");
    

    if( !isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: login.php" );
        
        exit; // encerra todas as funções da página...
    }

	if(count($_SESSION['carrinho']) == '0')
	{
		 echo"<script>alert('Não existe produtos no carrinho');</script>";
		 echo"<script>window.location='meu_carrinho.php'</script>";
	}
	else
	{
		$_id_session_cliente = $_SESSION['login'];
		$_sql_captura_id_cliente =  "SELECT * FROM cliente WHERE user = md5('$_id_session_cliente')";
		$_query = mysqli_query($_conexao,$_sql_captura_id_cliente) or die (mysqli_error($_conexao));
		$_line = mysqli_fetch_array($_query);

		$_id_cliente = $_line['cod_cliente'];

		date_default_timezone_set('America/Sao_Paulo');
		$_insert_pedido = "INSERT INTO pedido (cod_cliente,status_pedido,valor_total,desconto,data,hora) VALUES('$_id_cliente','Processando','0','0','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')";
		mysqli_query($_conexao, $_insert_pedido);
		$read_ultimo_pedido = mysqli_query($_conexao, "SELECT cod_pedido FROM pedido ORDER BY cod_pedido DESC LIMIT 1");
		$read_ultimo_pedido_view = null;




		if(mysqli_num_rows($read_ultimo_pedido) > '0')
		{
			foreach ($read_ultimo_pedido as $read_ultimo_pedido_view);
						
		}
	
		}




		foreach ($_SESSION['carrinho'] as $_id_produto => $_qtd_produto)
	    {
	    	$read_produto_carrinho = mysqli_query($_conexao, "SELECT descricao, valor_unitario FROM item WHERE cod_item = '".$_id_produto."'");
            if(mysqli_num_rows($read_produto_carrinho) > '0')
            {
                foreach ($read_produto_carrinho as $read_produto_carrinho_view)
                {

	                $_valor_total_produto_carrinho = $_qtd_produto * $read_produto_carrinho_view['valor_unitario'];	                 
	                $_valor_total_venda += $_valor_total_produto_carrinho;

             	}
                   
            }
			$_insert_itens_pedido = "INSERT INTO itens_do_pedido(cod_item, cod_pedido,qtd, valor_unitario ,valor_total) VALUES('".$_id_produto."','".$read_ultimo_pedido_view['cod_pedido']."','".$_qtd_produto."','".$read_produto_carrinho_view['valor_unitario']."','".$_valor_total_produto_carrinho."')";
			mysqli_query($_conexao, $_insert_itens_pedido);

		}
		$_update_pedido = "UPDATE pedido SET valor_total ='".$_valor_total_venda."' WHERE cod_pedido= '".$read_ultimo_pedido_view['cod_pedido']."'";
		mysqli_query($_conexao,$_update_pedido);
 
		//echo"<script>alert('Não existe produtos no carrinho');</script>";
		echo"<script>window.location='meus_pedidos.php'</script>";

		



	


?>
