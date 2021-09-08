<?php
    
    include_once("../db/conexao.php");
    session_start();

     if( !isset( $_SESSION["adm"] ) && !isset( $_SESSION["senha"] ) )
    {
        header( "location: ../admin/php/login.php" );
        
        exit; // encerra todas as funções da página...
    }

    
    if(isset($_GET['cat']) && $_GET['cat'] !='')
    {
      
        $id_cat = addslashes($_GET['cat']);
        $sql_categoria = "AND item_id_categoria ='".$id_cat."'";

    }
    else
    {
          
      $sql_categoria = "";

    }


    define( 'FPDF_FONTPATH', 'font/' ); // CONSTANTE - COMO SE FOSSE UMA VARIÁVEL QUE TEM NA CLASSE FPDF
    // 'font/' onde vai achar as fontes de caracteres

    require_once( "fpdf/fpdf.php" );

    $_pdf = new FPDF( 'P', 'cm', 'A4' );
    // P - formato porta retrato - fique de pé OU L - formato paisagem
    // cm - medidas em centímetros - unidade de medida para a formatação da página de trabalho. Pode ser também: in -> polegada / pt -> pontos / mm -> milímetros
    // A4(210mm x 298mm) - tamanho da página de trabalho. Pode ser: A5, A3, etc.

    $_pdf->Open();
    // Abre um novo arquivo PDF - na memória

    $_pdf->AddPage(); 
    // Adicona uma nova página no arquivo PDF, antes era apenas um espaço

    /* Configurar a fonte utilizada na página do arquivo PDF. Adiciona uma fonte ao arquivo PDF */

   
    $_pdf->AddFont('times', '', 'times.php');
    // 'nome da fonte', 'estilo', 'nome do arquivo.php que é a referência da fonte escolhida' -> arquivo está dentro da pasta font/

    $_pdf->setLeftMargin( 2.5 );
    // Define a margem esquerda do documento PDF -> 2,5cm

    $_pdf->setTopMargin( 2.5 );
    // Define a margem de cima do documento PDF
    // Por padrão as margens são de 1cm

    /* Cabeçalho da página(tabela de resultados/usuários) PDF */
    //Configurar a fonte para o cabeçalho do documento PDF
    $_pdf->setFont('times', 'B', 20);

     $_pdf->SetFillColor( 255, 255, 224);
    // Define a cor de fundo(RBG) da linha.

    $_img = $_pdf->Image('../imagens/logo final.jpg', 2.5, 1, 4, 3, 'JPEG');

    $_pdf->Cell(4, 3, '', 1, 0, '');
    //  cria uma célula que irá conter a imagem

    $_pdf->Cell(12, 3, 'ITENS POR CATEGORIA', 1, 1, 'C', FALSE);

    $_pdf->Ln( 1 );
    // pula uma linha em branco com um 1cm de altura


     $_pdf->SetFont('times', 'B', 14);
    // Configuração do cabeçalho das colunas

    $_pdf->SetTextColor(0,0,128);
    // Define a cor da linha(RGB)

    $_pdf->SetFillColor(220, 220, 220);
    // Define a cor de fundo da linha(RGB)

    $_pdf->SetDrawColor(112, 118, 144);
    // Define a cor da borda(RGB) da linha/célula

    $_pdf->Cell( 2, 1, 'ID', 1, 0, 'C', TRUE);
    $_pdf->Cell( 2, 1, 'PRECO', 1, 0, 'C', TRUE);
    $_pdf->Cell( 12, 1, 'DESCRICAO'     , 1, 1, 'C', TRUE);
   
    $_pdf->SetFont('times', '', 12);
    $_pdf->SetTextColor(0,0,0);
    $_pdf->SetFillColor(245,245,220);


    $read_produto = mysqli_query($_conexao, "SELECT * FROM item WHERE cod_item !='' $sql_categoria ORDER BY descricao ASC");

    if(mysqli_num_rows($read_produto) > '0')      
    {

        
        foreach ($read_produto as $read_produto_view) 
        {
                 
          $_pdf->Cell( 2, 1, $read_produto_view['cod_item'], 1, 0, 'C', TRUE);
          $_pdf->Cell( 2, 1, $read_produto_view['valor_unitario'] , 1, 0, 'C', TRUE);
          $_pdf->Cell( 12, 1, $read_produto_view['descricao'] , 1, 1, 'L', TRUE);


                         
        }
      } 
        
      
      



    
    $_pdf->Output();
    // exibe no navegador o conteúdo de um arquivo PDF... e o fecha em seguida...

    $_pdf->Close();


?>


