<?php

    if( isset( $_SESSION["login"] ) && !isset( $_SESSION["password"] ) )
    {
        header( "location: ../php/login.php" );
        
        exit; 
    }

    define( 'FPDF_FONTPATH', 'font/' ); 

    require_once( "fpdf/fpdf.php" );

    $_pdf = new FPDF( 'P', 'cm', 'A4' );
  

    $_pdf->Open();
  

    $_pdf->AddPage(); 
    
   
    $_pdf->AddFont('times', '', 'times.php');
   

    $_pdf->setLeftMargin( 2.5 );
    

    $_pdf->setTopMargin( 2.5 );
  
    $_pdf->setFont('times', 'B', 20);

     $_pdf->SetFillColor( 255, 255, 224);
    // Define a cor de fundo(RBG) da linha.

    $_img = $_pdf->Image('../imagens/logo final.jpg', 2.5, 1, 4, 3, 'JPEG');

    $_pdf->Cell(4, 3, '', 1, 0, '');
   
    $_pdf->Cell(12, 3, 'MEUS PEDIDOS', 1, 1, 'C', FALSE);

    $_pdf->Ln( 1 );
    // pula uma linha em branco com um 1cm de altura


     $_pdf->SetFont('times', 'B', 14);
   

    $_pdf->SetTextColor(0,0,128);
   

    $_pdf->SetFillColor(220, 220, 220);


    $_pdf->SetDrawColor(112, 118, 144);
  

    $_pdf->Cell( 2, 1, 'ID', 1, 0, 'C', TRUE);
    $_pdf->Cell( 4, 1, 'VALOR TOTAL'    , 1, 0, 'C', TRUE);
    $_pdf->Cell( 4, 1, 'STATUS', 1, 0, 'C', TRUE);
    $_pdf->Cell( 3, 1, 'DATA'     , 1, 0, 'C', TRUE);
    $_pdf->Cell( 3, 1, 'HORA'     , 1, 1, 'C', TRUE);

    $_pdf->SetFont('times', '', 12);
    $_pdf->SetTextColor(0,0,0);
    $_pdf->SetFillColor(245,245,220);

    include_once("../db/conexao.php");
    session_start();

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
             
                $_pdf->Cell( 2, 1, $read_pedido_view['cod_pedido'], 1, 0, 'C', TRUE);
                $_pdf->Cell( 4, 1, $read_pedido_view['valor_total'] , 1, 0, 'C', TRUE);
                $_pdf->Cell( 4, 1, $read_pedido_view['status_pedido'], 1, 0, 'C', TRUE);
                $_pdf->Cell( 3, 1, $read_pedido_view['data']     , 1, 0, 'C', TRUE);
                $_pdf->Cell( 3, 1, $read_pedido_view['hora']   , 1, 1, 'C', TRUE);


                     
            }
    }

    
    $_pdf->Output();
 

    $_pdf->Close();
?>