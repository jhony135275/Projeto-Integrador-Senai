<?php

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
    $_pdf->setFont('times', 'BI', 20);

/*
    objeto do tipo PDF->setFont( fonte, estilo e o tamanho da fonte)
    
    estilos:
    B = bold
    I = italic
    U = underline = sublinhado
    N = normal
    se não for declarado nenhum estilo o padrão será o normal
*/

    $_pdf->SetFillColor( 255, 255, 224);
    // Define a cor de fundo(RBG) da linha.
    /*

    Image( 'nome e extensão da imagem', coordenada X, coordenada Y, largura da imagem, altura da imagem, tipo do arquivo da imagem(extensão) )

    As coordenadas se baseiam a partir do canto superior esquerdo da página do arquivo PDF

    */

    $_img = $_pdf->Image('img/vader.jpg', 2.5, 1, 4, 3, 'JPEG');
    $_pdf->Cell(4, 3, '', 1, 0, '');
    //  cria uma célula que irá conter a imagem

    $_pdf->Cell(12, 3, 'TABELA DE USUARIO', 1, 1, 'C', TRUE);
    /*
        estrutura do método Cell()
        12cm - largura da célula
        3cm - altura da céluka
        '' - texto, título da tabwla
        1 - com borda e 0 = sem borda
        1 - para gerar uma quebra de linha, 0 = sem quebra de linha (imprimir/criar outra célula na mesma linha)
        'C' - centralizado
        'L' - left
        'R' - right
        TRUE - significa que a célula aceita cor de fundo
    */

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

    $_pdf->Cell( 1, 1, 'ID'       , 1, 0, 'C', TRUE);
    $_pdf->Cell( 3, 1, 'LOGIN'    , 1, 0, 'C', TRUE);
    $_pdf->Cell( 10, 1, 'PASSWORD', 1, 0, 'C', TRUE);
    $_pdf->Cell( 2, 1, 'type'     , 1, 1, 'C', TRUE);

    include_once("db/conexao.php");

    $_sql = $_pdo->prepare("SELECT * FROM usuario");
    $_sql->execute();
    $_resultset = $_sql->fetchAll(PDO::FETCH_ASSOC);

    $_pdf->SetFont('times', '', 12);
    $_pdf->SetTextColor(0,0,0);
    $_pdf->SetFillColor(245,245,220);

    $_fundo = 1; // variável de controle do processo de "zebrar" a cor de fundo da tabela - cor sim, cor nao

    foreach($_resultset as $_line){
        $_pdf->Cell( 1, 1, $_line['id']      , 1, 0, 'C', TRUE );
        $_pdf->Cell( 3, 1, $_line['login']   , 1, 0, 'C', TRUE );
        $_pdf->Cell( 10, 1, $_line['password'], 1, 0, 'C', TRUE );
        $_pdf->Cell( 2, 1, $_line['type']    , 1, 1, 'C', TRUE );

        $_fundo++;

        if( $_fundo % 2 == 0 ){ // o numero da variável for par

            $_pdf->SetFillColor(255,255,255);

        }else{

            $_pdf->SetFillColor(245,245,220);
        
        }
    }

    $_pdf->Output();
    // exibe no navegador o conteúdo de um arquivo PDF... e o fecha em seguida...

    $_pdf->Close();
    // fecha o documento pdf ( considerado terminado/pronto )
    
?>